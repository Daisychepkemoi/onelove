<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\proposal;

class usersController extends Controller
{
     public function rejected(Proposal $proposal)
     {

     		$users=auth()->user();
     		$user=$users->email;
            $proposal = Proposal::where('Submitted_by', $user)->where('stage', 'reject')->orderBy('updated_at','desc')->get();
            
            return view('user.user',compact('proposal','users'));
    }
    public function stageoneuser(Proposal $proposal)
    {
        	$users=auth()->user();
     		$user=$users->email;
           
            $proposal=Proposal::where('Submitted_by', $user)->where('stage','stageone')->orderBy('updated_at','desc')->get();
            
            return view('user.user',compact('proposal','users'));
    }
     public function userdrafts(Proposal $proposal)
    {
            $users=auth()->user();
            $user=$users->email;
           
            $proposal=Proposal::where('Submitted_by', $user)->where('draft',1)->orderBy('updated_at','desc')->get();
            
            return view('user.user',compact('proposal','users'));
    }
    public function stagetwouser(Proposal $proposal)
    {
         	$users=auth()->user();
     		$user=$users->email;
            $proposal=Proposal::where('Submitted_by', $user)->where('stage','stagetwo')->orderBy('updated_at','desc')->get();
            return view('user.user',compact('proposal','users'));
    }
    public function newProposals(Proposal $proposal)
    {
         	$users=auth()->user();
     		$user=$users->email;
            $proposal=Proposal::where('Submitted_by', $user)->whereNull('stage')->orderBy('updated_at','desc')->get();
           
            return view('user.user',compact('proposal','users'));
    }
    public function accepteduser(Proposal $proposal)
    {
            $users=auth()->user();
            $user=$users->email;
            $proposal=Proposal::where('Submitted_by', $user)->where('stage','Accepted')->orderBy('updated_at','desc')->get();
           
            return view('user.user',compact('proposal','users'));
    }
    public function userback()
    {
            return redirect('/userproposal');
    }

}
