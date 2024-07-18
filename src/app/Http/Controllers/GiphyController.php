<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\GiphyService;

class GiphyController extends Controller
{
    protected $giphy;

    public function __construct(GiphyService $giphy)
    {
        $this->giphy = $giphy;
    }

    public function search(Request $request)
    {
        $response = $this->giphy->searchGifs($request);

        return $this->sendResponse($response);
    }
    
    public function searchById(Request $request)
    {
        $response = $this->giphy->searchGifsById($request);

        return $this->sendResponse($response);
    }
}
