<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Icone;
use Illuminate\Http\Request;

class IconesController extends Controller
{
    public function index()
    {
        $icones = Icone::latest()->paginate(5);

        return view('website.icones.index', compact('icones'));
    }
}
