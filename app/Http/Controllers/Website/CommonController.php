<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;

class CommonController extends Controller
{
    public function about()
    {
        return view('website.about');
    }
}
