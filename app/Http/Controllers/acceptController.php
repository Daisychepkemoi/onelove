<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Proposal;
use App\Notifications\acceptorreject;

class acceptController extends Controller
{
	 public function __construct(){
    // $this->middleware('auth')->except(['index']);
        $this->middleware('auth');
  }
    public function update(Request $request, proposal $proposal)
    {
        $users=auth()->user();
          

             $proposi = Proposal::where('id', $request->id)->first();

            
        
        $proposi->stage='Accepted';
        
        $proposi->save();
         $users->notify(new acceptorreject($proposal));
      
        return redirect('/admin');

        }
}
