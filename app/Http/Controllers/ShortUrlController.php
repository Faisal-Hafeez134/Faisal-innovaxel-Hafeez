<?php

namespace App\Http\Controllers;

use App\Models\ShortUrl;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class ShortUrlController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'url' => 'required|url',
        ]);

        if ($validator->fails()) {
            return response($validator->errors(), 422);
        }

        $short = ShortUrl::create([
            'original_url' => $request->url,
            'short_code' => Str::random(6),
        ]);

        if (!$short) {
            return response(['error' => 'Something went wrong please try again later'], 500);
        }
        return response()->json($short, 201);
    }



}

