<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MessageController extends Controller
{

    public function sendMessage(Request $request)
    {

        $valid = Validator::make($request->all(), [
            'name' => 'required|min:3|max:60',
            'email' => 'required|email',
            'subject' => 'required|min:3|max:100',
            'message' => 'required|min:10|max:400'
        ], [
            'name.required' => 'Поле имя является обязательным для ввода',
            'email.required' => 'Поле email является обязательным для ввода',
            'subject.required' => 'Поле тема является обязательным для ввода',
            'message.required' => 'Поле сообщение является обязательным для ввода',

            'name.min' => 'Поле имя должно содержать не менее 3 символов',
            'subject.min' => 'Поле тема должно содержать не менее 3 символов',
            'message.min' => 'Поле сообщение должно содержать не менее 10 символов',

            'name.max' => 'Поле имя должно содержать не больше 60 символов',
            'subject.max' => 'Поле тема должно содержать не больше 100 символов',
            'message.max' => 'Поле сообщение должно содержать не больше 400 символов'
        ]);

        if ($valid->fails()) {

            return Response::json([
                'success' => false,
                'errors' => $valid->errors()->all()
            ], 422);

        } else {

            $message = new Message();

            $message->user_name = $request->input('name');
            $message->email = $request->input('email');
            $message->message_theme = $request->input('subject');
            $message->message_query = $request->input('message');

            $message->save();
            return Response::json([
                'success' => true,
                'message' => "Сообщение было отправлено!"
            ], 200);
        }


    }

}
