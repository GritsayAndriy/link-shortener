<?php

namespace App\Http\Controllers;

use App\Models\Link;

class RedirectController extends Controller
{
    public function __invoke(Link $link)
    {
        if ($this->canRedirect($link)) {
            abort(404);
        }

        $link->increment('current_redirect');

        return redirect()->away($link->url);
    }

    protected function canRedirect(Link $link)
    {
        return $link->max_redirect > 0 && $link->current_redirect >= $link->max_redirect
            || $link->end_life->lessThan(now());
    }
}
