<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\acceptorreject;
use App\proposal;

class rejectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function Update()
    {
    	  
        $proposal = Proposal::where('id', $request->id)->first();

        
        $proposal->stage='reject';
        ;
        $proposal->save();
         $users->notify(new acceptorreject($proposal));
        
        return redirect('/admin');
    }
}
