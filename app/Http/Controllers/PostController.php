<?php

namespace App\Http\Controllers;


use App\Http\Requests\CommentRequest;
use App\Http\Requests\SearchRequest;

use App\Models\Post;
use App\Models\View;
use App\Models\Comment;



class PostController extends Controller
{

    public function getMainPage()
    {
        $posts = new Post();
        $topPost = $posts->orderBy('views', 'desc')->limit(1)->first();

        return view('index', [
            'topPost' => $topPost,
            'posts' => $posts->orderBy('id', 'desc')->where('id', '!=', $topPost->id)->limit(6)->get()
        ]);
    }


    public function getPostPage(int $id)
    {
        $post = new Post();
        $views = new View();

        $clientIp = request()->getClientIp();
        $checkView = $views->where('user_ip', '=', $clientIp)->get()->where('post_id', '=', $id);

        $checkPost = $post->find($id);

        if (!$checkView->count()) {
            $checkPost->increment('views');
            $views->post_id = $id;
            $views->user_ip = $clientIp;
            $views->save();
        }

        if ($checkPost) {
            return view('article', [
                'postQuery' => $checkPost,
                'comments' => Comment::orderBy('id', 'desc')->where('post_id', '=', $id)->simplepaginate(8),
                'post_id' => $checkPost->id
            ]);
        } else {
            return redirect()->route('welcome-page')->with('danger', 'Пост не найден');
        }

    }


    public function setComment(int $id, CommentRequest $request)
    {
        $setComment = new Comment();

        $setComment->post_id = $id;
        $setComment->user_name = $request->input('name');
        $setComment->email_address = $request->input('email');
        $setComment->comment_query = $request->input('message');
        $setComment->save();

        return redirect()->route('post-page', $id)->with('success', 'Комментарий написан!');
    }


    public function getPostsPage(string $category)
    {
        $posts = new Post();
        $checkPosts = $posts->orderBy('id', 'desc')
            ->where('category', '=', $category)
            ->simplepaginate(8);

        if ($checkPosts->count()) {
            return view('posts', [
                'query' => $checkPosts,
                'categoryName' => $category
            ]);
        } else {
            return redirect()->route('welcome-page')->with('danger', 'Постов не найдено!');
        }

    }


    public function getSearchPage(SearchRequest $request)
    {
        $searchQuery = $request->get('search_query');

        $posts = new Post();
        $checkSearch = $posts->orderBy('id', 'desc')
            ->where('title', 'like', "%{$searchQuery}%")
            ->simplepaginate(8);

        if ($checkSearch->count()) {
            return view('search', [
                'query' => $checkSearch,
                'searchQuery' => $searchQuery
            ]);
        } else {
            return redirect()->route('welcome-page')->with('danger', 'По вашему запросу ничего не найдено!');
        }

    }

}
