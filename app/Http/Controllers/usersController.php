<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\proposal;

class usersController extends Controller
{
     public function rejected(Proposal $proposal){

     		$users=auth()->user();
     		$user=$users->email;
            // $proposal=Proposal::where(['Submitted_by', $user],['stage','rejected'])->get();
            $proposal = Proposal::where('Submitted_by', $user)->where('stage', 'reject')->get();
            // dd($proposal);
            return view('user.user',compact('proposal'));
        }
        public function stageoneuser(Proposal $proposal){
        	$users=auth()->user();
     		$user=$users->email;
            // dd($user);
            $proposal=Proposal::where('Submitted_by', $user)->where('stage','stageone')->get();
            
            return view('user.user',compact('proposal'));
        }
         public function stagetwouser(Proposal $proposal){
         	$users=auth()->user();
     		$user=$users->email;
            $proposal=Proposal::where('Submitted_by', $user)->where('stage','stagetwo')->get();
            return view('user.user',compact('proposal'));
        }
         public function newProposals(Proposal $proposal){
         	$users=auth()->user();
     		$user=$users->email;
            $proposal=Proposal::where('Submitted_by', $user)->whereNull('stage')->get();
           
            return view('user.user',compact('proposal'));
        }
        public function accepteduser(Proposal $proposal){
            $users=auth()->user();
            $user=$users->email;
            $proposal=Proposal::where('Submitted_by', $user)->where('stage','Accepted')->get();
           
            return view('user.user',compact('proposal'));
        }
        public function userback(){
            return redirect('/userproposal');
        }
}
