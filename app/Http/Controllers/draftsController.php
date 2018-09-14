<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Proposal;
class draftsController extends Controller
{
  public function update(request $request)
  {
     $users=auth()->user();
     $proposi = Proposal::where('Submitted_by', $users->email)->latest()->first();

   $proposi->draft=true;
     $proposi->save();
      // dd($proposi->title);
   
     return redirect('/userproposal');
    
  }
}
