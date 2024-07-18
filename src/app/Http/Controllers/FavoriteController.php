<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Favorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FavoriteController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $favorites = Favorite::where('user_id', $user->id)->get();
        return response()->json($favorites);
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        $input = $request->all();

        $validator = Validator::make(
            $input,
            [
                'gif_id' => 'required|string|unique:favorites',
                'embed_url' => 'required|url|unique:favorites',
            ]);

        if ( $validator->fails() ) {
            return $this->sendResponse(['success' => false, 'message' => $validator->errors(), 'code' => 422]);
        }
        
    
        $favorite = Favorite::create([
            'user_id' => $user->id,
            'gif_id' => $request->input('gif_id'),
            'embed_url' => $request->input('embed_url')
        ]);

        return $this->sendResponse(['success' => true, 'data' => $favorite]);
    }

    public function destroy(Request $request)
    {
        try {
            $request->validate([
                'gif_id' => 'required|string',
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return $this->sendResponse(['success' => false, 'message' => $e->getMessage(), 'code' => 500]);
        }

        $user = Auth::user();
        $gif_id = $request->input('gif_id');
        $favorite = Favorite::where('user_id', $user->id)->where('gif_id', $gif_id)->first();
        
        if ( $favorite === null ) {
            return $this->sendResponse(['success' => false, 'code' => 404, 'message' => 'gif not found']);
        }
        
        $favorite->delete();
        return $this->sendResponse(['success' => true, 'code' => 200, 'message' => 'gif delete successfully']);
        
        
        
    }
}

