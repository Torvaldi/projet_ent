<?php

namespace App\Http\Controllers;

use App\Survey;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Session;

use Illuminate\Support\Facades\DB;

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

    public function vote(Request $request) {
        $response_id = $request->input('response');

        DB::table('response_surveys')->insert([
            'response_id' => $response_id,
            'user_id' => Auth::user()->id,
            'created_at' => Carbon::now()
        ]);

        Session::flash('success', 'Vote pris en compte ! Merci !');
        return back();
    }
}
