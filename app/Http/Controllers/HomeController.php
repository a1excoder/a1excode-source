<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }


    public function editName(Request $request)
    {
        $validated = $request->validate([
            'login' => 'required|string|max:255|min:1'
        ]);

        $user = new User();
        $checkName = $user->where('name', '=', $request->input('login'))->get();

        if ($checkName->count() == false) {
            $user->find(Auth::id())->update(['name' => $request->input('login')]);
            return redirect()->route('home')->with('success', 'Ваше имя было изменено');

        } elseif ($request->input('login') == Auth::user()->name) {
            return redirect()->route('home')->with('danger', 'У вас сейчас такое имя!');
        } else {
            return redirect()->route('home')->with('danger', 'Это имя уже занято!');
        }


    }


    public function editPassword(Request $request)
    {
        $validated = $request->validate([
            'last_pass' => 'required',
            'new_pass' => 'required|string|min:8'
        ]);

        $lastPass = $request->input('last_pass');
        $newPass = Hash::make($request->input('new_pass'));

        $todayUser = User::find(Auth::id());


        if (Hash::check($lastPass, $todayUser->password)) {
            $todayUser->update([
                'password' => $newPass
            ]);
            return redirect()->route('home')->with('success', 'Пароль был изменен!');

        } else {
            return redirect()->route('home')->with('danger', 'Старый пароль не верный!');
        }

    }


    public function deleteAccount(Request $request)
    {
        $todayUser = User::find(Auth::id());
        $formPass = $request->input('login');

        if (Hash::check($formPass, $todayUser->password)) {
            $todayUser->delete();
            Auth::logout();
            return redirect()->route('welcome-page')->with('success', 'Ваш аккаунт был удален!');
        } else {
            return redirect()->route('home')->with('danger', 'Пароль не верный!');
        }

    }

}
