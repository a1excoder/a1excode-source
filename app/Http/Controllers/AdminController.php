<?php

namespace App\Http\Controllers;

use App\Models\Post;

use App\Http\Requests\PostRequest;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\File;


class AdminController extends Controller
{

    public function adminPage()
    {
        return view('admin.admin');
    }


    public function setNewPost(PostRequest $request)
    {
        $postTable = new Post();

        $postTable->title = $request->input('title');
        $postTable->category = $request->input('category');
        $postTable->general_image = $request->file('image')->store('uploads', 'public');
        $postTable->post_query = $request->input('input');

        $postTable->save();

        return redirect()->route('admin-page')->with('success', "Пост был создан!");

    }


    public function deletePost(Request $request)
    {
        $verifyPost = Post::find($request->post('id'));

        if ($verifyPost) {
            File::delete('storage/'.$verifyPost->general_image);
            $verifyPost->delete();

            return redirect()->route('admin-page')->with('success', 'Пост был удален!');
        } else {
            return redirect()->route('admin-page')->with('danger', 'Пост не найден!');
        }

    }


    public function updatePost(Request $request)
    {
        $postId = $request->get('id');
        $checkValidPost = Post::find($postId);

        if (!$checkValidPost) {
            return redirect()->route('admin-page')->with('danger', 'Пост не найден!');
        } else {
            return view('admin.adminUpdate', [
                'query' => $checkValidPost
            ]);
        }

    }


    public function updateNewPost(PostRequest $request)
    {
        $postId = $request->get('id');
        $post = new Post();

        if ($request->file('image') == '') {
            $image = $request->input('lastImage');
        } else {
            File::delete('storage/'.$post->find($postId)->general_image);
            $image = $request->file('image')->store('uploads', 'public');
        }

        $post->find($postId)->update([
            'title' => $request->input('title'),
            'category' => $request->input('category'),
            'general_image' => $image,
            'post_query' => $request->input('input')
        ]);

        return redirect()->route('admin-page')->with('success', 'Пост был обновлен!');

    }


    public function uploadImage(Request $request)
    {
        $image = $request->file('image_i')->store('uploads', 'public');
        $pathToFile = asset('storage').'/'.$image;
        return redirect()->route('admin-page')->with('success', 'Image url: <a href='.$pathToFile.'>'.$pathToFile.'</a>');
    }


}
