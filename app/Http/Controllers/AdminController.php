<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Message;
use App\Models\Post;
use App\Models\Category;

use App\Http\Requests\PostRequest;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;


class AdminController extends Controller
{

    public function adminPage()
    {
        $messages = new Message();
        $comments = new Comment();

        return view('admin.admin', [
            'messages' => $messages->
            orderBy('id', 'desc')
            ->limit(6)
            ->get(),

            'comments' => $comments->
            leftJoin('posts', 'comments.post_id', '=', 'posts.id')
            ->limit(8)
            ->get()
        ]);
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


    public function createCategory(Request $request)
    {
        $categoryModel = new Category();

        $valid = $request->validate(
            ['new_category' => 'required'], 
            ['new_category.required' => 'Введите название категории']
        );

        $categoryName = $request->input('new_category');
        $checkCategory = $categoryModel->orderBy('id', 'desc')->where('name', '=', $categoryName)->get();

        if ($checkCategory != '[]') {
            return redirect()->route('admin-page')->with('danger', 'Такая категория уже существует!');

        } else {

            $categoryModel->name = $categoryName;
            $categoryModel->save();

            return redirect()->route('admin-page')->with('success', 'Категория была создана!');
        }

        
    }


    public function deleteCategory(Request $request)
    {
        $categoryModel = new Category();

        $valid = $request->validate(
            ['category_name' => 'required'], 
            ['category_name.required' => 'Выберите категорию']
        );

        $categoryName = $request->input('category_name');
        $checkCategory = $categoryModel->orderBy('id', 'desc')->where('name', '=', $categoryName);

        if ($checkCategory == '') {
            return redirect()->route('admin-page')->with('danger', 'Такой категории не существует!');

        } else {

            $checkCategory->delete();
            return redirect()->route('admin-page')->with('success', 'Категория была удалена');
        }

    }


}
