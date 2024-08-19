<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Url; 
use Illuminate\Support\Str;

class UrlController extends Controller
{
   
    public function shorten(Request $request)
    {
        $request->validate([
            'original_url' => 'required|url'
        ]);


        $shortenedUrl = env('APP_URL').'url/'.Str::random(6);


        $url = Url::create([
            'original_url' => $request->original_url,
            'shortened_url' => $shortenedUrl
        ]);

        return response()->json([
            'shortened_url' => url($shortenedUrl),
            'original_url' => $url->original_url
        ], 201);
    }


    public function redirect($shortened)
    {
        $url = Url::where('shortened_url', env('APP_URL').'url/'.$shortened)->first();
        if (!$url) {
            return response()->json(['message' => 'URL not found'], 404);
        }
  
        $url->increment('clicks');

        return response()->json([
            'original_url' => $url->original_url
        ], 201);
    }

    public function topUrls(Request $request) {
        $topUrls = Url::orderBy('clicks', 'desc')->take(5)->get();
    
        $totalClicks = Url::sum('clicks');
        $topClicks = $topUrls->sum('clicks');
    
        $remainingClicks = $totalClicks - $topClicks;
    
        return response()->json([
            'top_urls' => $topUrls,
            'remaining_clicks' => $remainingClicks
        ]);
    }


    // public function index(Request $request)
    // {
    //     $perPage = $request->get('per_page', 10); 
    //     $urls = Url::paginate($perPage);

    //     return response()->json($urls);
    // }

    public function index(Request $request) {
        $urls = Url::all();

        return response()->json($urls);
    }
}
