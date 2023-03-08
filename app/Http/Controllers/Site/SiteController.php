<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index()
    {
        $plans = Plan::with('details')->orderby('price','asc')->get();
        //dd($plans);
        return view('site.pages.home.index', compact('plans'));
    }
}
