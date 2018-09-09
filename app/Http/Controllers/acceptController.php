<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\proposal;
use App\Notifications\acceptorreject;

class acceptController extends Controller
{
	 public function __construct(){
    $this->middleware('auth')->except(['index']);
        // $this->middleware('');
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
