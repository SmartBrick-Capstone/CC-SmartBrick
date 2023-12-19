<?php

namespace App\Http\Controllers\Api;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class PredictionController extends Controller
{
    public function predict(Request $request)
    {
        $request->validate([
            'image' => 'required|file|mimes:png,jpg,jpeg',
        ]);

        $url = 'https://predict-gve6qti2uq-uc.a.run.app/predict';

        try {
            $client = new Client();

            $response = $client->post($url, [
                'multipart' => [
                    [
                        'name'     => 'image',
                        'contents' => fopen($request->file('image')->path(), 'r')
                    ]
                ]
            ]);

            $statusCode = $response->getStatusCode();
            $body = $response->getBody()->getContents();

            if ($statusCode == 200) {
                $res = json_decode($body);
                return response()->json([
                    'success' => $res->success,
                    'prediction' => $res->prediction
                ]);
            } else {
                $res = json_decode($body);
                return response()->json([
                    'success' => false,
                    'message' => $res->message ?? 'Failed'
                ], $statusCode);
            }
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Internal Server Error',
            ], 500);
        }
    }
}
