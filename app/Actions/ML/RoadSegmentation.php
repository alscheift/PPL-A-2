<?php

namespace App\Actions\ML;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Storage;


class RoadSegmentation
{
    public static function predict($image_path)
    {
        $predict_url = env('ML_API_URL').'/predict'.'/';
        
        $client = new Client();
        $body = [
            'multipart' => [
                [
                    'name'     => 'image',
                    'contents' => fopen(public_path('storage/'.$image_path), 'r')

                ]
            ]
        ];

        $response = $client->request('POST',$predict_url , $body);
        $response = json_decode($response->getBody()->getContents());

        return $response;
    }    
}
