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

        $existing = ShortUrl::where('original_url', $request->url)->first();

        if ($existing) {
            return response()->json([
                'message' => 'Short URL already exists',
                'data' => $existing,
            ], 409);
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

    public function show($code)
    {
        $short = ShortUrl::where('short_code', $code)->first();

        if (!$short)
            return response()->json(['error' => 'Not found'], 404);

        $short->increment('access_count');
        return response()->json($short, 200);
    }

    public function update(Request $request, $code)
    {
        $short = ShortUrl::where('short_code', $code)->first();

        if (!$short)
            return response()->json(['error' => 'Not found'], 404);

        $validator = Validator::make($request->all(), [
            'url' => 'required|url',
        ]);

        if ($validator->fails()) {
            return response($validator->errors(), 422);
        }

        $short->update(['original_url' => $request->url]);

        return response()->json($short, 200);
    }

    public function destroy($code)
    {
        $short = ShortUrl::where('short_code', $code)->first();

        if (!$short)
            return response()->json(['error' => 'Not found'], 404);

        $short->delete();
        return response()->noContent();
    }

    public function stats($code)
    {
        $short = ShortUrl::where('short_code', $code)->first();

        if (!$short)
            return response()->json(['error' => 'Not found'], 404);

        return response()->json([
            'id' => $short->id,
            'url' => $short->original_url,
            'shortCode' => $short->short_code,
            'createdAt' => $short->created_at,
            'updatedAt' => $short->updated_at,
            'accessCount' => $short->access_count,
        ], 200);
    }




}

