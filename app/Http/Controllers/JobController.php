<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class JobController extends Controller
{
    const API_URL = 'https://pixl8.com/api/jobs/v1/';

    const APPLY_URL = self::API_URL . 'entity/application/';

    public function apply(Request $request)
    {
        $client = new Client();

        $parameters = [
            'testmode' => $request->input('test_mode'),
        ];

        $randomId = sprintf("%04x", mt_rand(0, 0xffff));
        
        $body = [
            [
                'id' => $randomId,
                'fullname' => $request->input('full_name'),
                'email' => $request->input('email'),
                'website' => $request->input('website'),
                'github' => $request->input('github'),
                'twitter' => $request->input('twitter'),
                'linkedin' => $request->input('linkedin'),
                'message' => $request->input('message'),
            ]
        ];

        try {
            $response = $client->post(self::APPLY_URL, [
                'query' => $parameters,
                'json' => $body
            ]);
        } catch (\Exception $e) {
            \Log::error($e);
            return redirect('/')->with([
                'success' => false,
                'message' => 'Error occured! Please try again.',
            ]);

        }

        if ($response->getStatusCode() === 200) {
            $success = true;
            $message = "Successfully applied!";

        } else {
            $success = false;
            $message = "Error occured!";

        }

        return redirect('/')->with([
            'success' => $success,
            'message' => $message,
        ]);
    }
}
