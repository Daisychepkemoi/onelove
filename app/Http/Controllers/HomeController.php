<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\proposal;

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
        return view('session.create');
    }

    public function update(request $request)
    {
         $users=auth()->user();
          

        $proposi = Proposal::where('email', $users->email)->first();

        $proposi->draft=false;
    
        $proposi->save();
        // 
        // dd($proposi->draft);
      
        return redirect('/userproposal');
    }
}

