<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class GenerateLinkController extends Controller
{
    public function __invoke(Request $request)
    {
        $attributes = $request->validate([
            'url' => 'required|string',
            'max_redirect' => 'nullable|integer',
            'expired_at' => 'nullable|date_format:H:i',
        ]);

        $attributes['expired_at'] = $this->addTimeToCurrentDate($attributes['expired_at']);
        $attributes['token'] = $this->generateToken();
        Link::create($attributes);

        return view('link.show-short-link', [
            'shortLink' => route('links.show', $attributes['token'])
        ]);
    }

    protected function addTimeToCurrentDate($time)
    {
        if (is_null($time)) {
            return now()->addHour();
        }
        list($hours, $minutes) = Str::of($time)->explode(':');
        return now()->addHours($hours)->addMinutes($minutes);
    }

    protected function generateToken()
    {
        return Str::random(8);
    }
}
