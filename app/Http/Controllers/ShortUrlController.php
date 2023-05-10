<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShortUrls\ShortUrlStore;
use App\Models\ShortUrl;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;


class ShortUrlController extends Controller
{
    public function store(ShortUrlStore $request){

        // Generate unique short url 
        $short_url = $this->generateShortUrl();

        // Create a new short URL record
        $shortUrlRecord = ShortUrl::create([
            'url' => $request->url,
            'short_url' => $short_url,
            'visits' => 0
        ]);

        // Redirect to the details page for the new short URL
        return redirect()->route('details', $short_url);
 
    }

    private function generateShortUrl(){

        $shortUrl = Str::random(8);
        $rules = ['short_url' => Rule::unique('short_urls')];
        $validate = Validator::make([$shortUrl], $rules)->passes();

        return $validate ? $shortUrl : $this->generateShortUrl();

    }

    
    public function details(Request $request, $short_url){

        $url = ShortUrl::where('short_url', $short_url)->firstOrFail(); 
        $url->visits++;
        $url->save();
    
        return view('details')->with(['short_url' => $short_url, 'url' => $url->url, 'visits' => $url->visits]);


    }
}
