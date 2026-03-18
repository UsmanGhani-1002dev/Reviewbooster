<?php

namespace App\Http\Controllers;

use App\Models\SubscriptionPlan;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $cards = SubscriptionPlan::all();
        return view('home', compact('cards'));
    }

     public function aboutUs()
    {
        return view('aboutus');
    }

    public function howitswork()
    {
        return view('howitswork');
    }
}
