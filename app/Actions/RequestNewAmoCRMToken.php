<?php

namespace App\Actions;

use AlfaDevTeam\RestApiResponses\Controllers\ApiResponses;
use Illuminate\Support\Facades\Http;

class RequestNewAmoCRMToken
{
    use ApiResponses;

    public function execute(array $data)
    {
        try {
            $response = Http::withHeaders([
                'Content-type' => 'application/json',
            ])->post(config('amocrm.referer') . '/oauth2/access_token', $data);

            $response = $response->json();

            return [
                'accessToken' => $response['access_token'],
                'refreshToken' => $response['refresh_token'],
                'expires' => now()->addSeconds($response['expires_in']),
                'token_type' => $response['token_type'],
                'baseDomain' => config('amocrm.referer'),
            ];
        } catch (\Exception $e) {
            $this->respondError($e->getMessage(), 500);
        }

    }

}
