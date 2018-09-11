<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\acceptorreject;
use App\proposal;

class stage3Controller extends Controller
{
     public function update(Request $request, proposal $proposal)
    {
         $users=auth()->user();

         $proposi = Proposal::where('id', $request->id)->first();

         $proposi->stage='stagetwo';
       
        $proposi->save();
        $users->notify(new acceptorreject($proposal));
        
        return redirect('/admin');
	}

}
