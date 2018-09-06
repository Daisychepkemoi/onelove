<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\acceptorreject;
use App\Proposal;

class rejectController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function Update(){
    	  // $proposal= Proposal::find('id');
        // $proposal = Proposal::first();
        $proposal = Proposal::where('id', $request->id)->first();

        
        $proposal->stage='reject';
        // $passport->email=$request->get('email');
        // $passport->number=$request->get('number');
        // $passport->office=$request->get('office');
        $proposal->save();
         $users->notify(new acceptorreject($proposal));
        // dd($proposal);
        return redirect('/admin');
    }
}
