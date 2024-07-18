<?php

namespace App\Services;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;
use App\Events\GiphySearched;

class GiphyService
{
    protected $client;
    protected $api_key;

    public function __construct()
    {
        $this->client = new Client();
        $this->api_key = env('GIPHY_API_KEY'); // La clave API de Giphy debe estar en el archivo .env
    }

    public function searchGifs($request)
    {
        $query = $request->input('query', null);

        if ($query === null) {
            $response = [
                'success' => false,
                'message' => "error: query parameter is empty",
                'code' => 422,
                'data' => []
            ];
            return $response;
        }

        $params = ['query' => [
                    'api_key' => $this->api_key,
                    'q' => $query,
                    'limit' => 5
                ]];

        $reqResponse = $this->client->get('https://api.giphy.com/v1/gifs/search', $params);
        
        $responseBody = $reqResponse->getBody()->getContents();

        // Dispara el evento
        event(new GiphySearched(Auth::id(), 'search', json_encode($params), $reqResponse->getStatusCode(), $responseBody, $request->ip()));

        $response = [
            'success' => true,
            'message' => "ok",
            'code' => 200,
            'data' => json_decode($responseBody, true)
        ];

        return $response;
        
    }
    public function searchGifsById($request)
    {
        $gifId = $request->input('gifId', null);

        if ($gifId === null) {
            $response = [
                'success' => false,
                'message' => "error: gifId parameter is empty",
                'code' => 422,
                'data' => []
            ];
            return $response;
        }

        $params = [
                    'api_key' => $this->api_key,
                    'id' => $gifId,
                    'limit' => 5
                ];

        $reqResponse = $this->client->get('https://api.giphy.com/v1/gifs/'.$gifId.'?api_key=' . $this->api_key . '&rating=g');
        
        $responseBody = $reqResponse->getBody()->getContents();

        // Dispara el evento
        event(new GiphySearched(Auth::id(), 'search-by-id', json_encode($params), $reqResponse->getStatusCode(), $responseBody, $request->ip()));

        $response = [
            'success' => true,
            'message' => "ok",
            'code' => 200,
            'data' => json_decode($responseBody, true)
        ];

        return $response;
        
    }
}
