<?php

namespace App\Http\Controllers;

use App\Survey;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $survey = Survey::orderBy('created_at', 'desc')->first();
        return view('home', compact('survey'));
    }
}
