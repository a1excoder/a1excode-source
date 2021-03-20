<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Response;


class WeatherController extends Controller
{

    private static $apiKey = '5d02a677f91667c53fba68306ffd088d';

    public function getWeather(Request $request)
    {

        $valid = Validator::make($request->all(), [
            'city' => 'required'
        ], [
            'city.required' => 'Введите название вашего города'
        ]);


        if ($valid->fails()) {

            return Response::json([
                'success' => false,
                'errors' => $valid->errors()->all()
            ], 422);
        } else {

            $response = Http::get('http://api.openweathermap.org/data/2.5/weather', [
                'APPID' => self::$apiKey,
                'q' => $request->post('city'),
                'units' => 'metric',
                'lang' => 'ru'
            ]);

            if ($response->failed()) {

                return Response::json([
                    'success' => false,
                    'errors' => ['Некорректное название города']
                ], 422);

            } else {

                return Response::json([
                    'success' => true,
                    'temp' => $response['main']['temp'],
                    'city' => $response['name'],
                    'humidity' => $response['main']['humidity'],
                    'description' => $response['weather'][0]['description']
                ], 200);
            }


        }

    }
}
