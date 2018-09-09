<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\proposal;
use App\Notifications\acceptorreject;
// use App\User;

class adminController extends Controller
{
     public function __construct(){
    // $this->middleware('auth')->except(['index']);
        $this->middleware('auth');
  }
    public function create(){
    	
    		$proposal=Proposal::latest()->get();
    	
    	return view('partials.adminside',compact('proposal'));
    }
    public function show(Proposal $proposal){
    	
    	  $propos = Proposal::where('id', request('id'))->get();
         

    	return  view('admin.move',compact('propos'));
    	
    }

     public function rejected(Proposal $proposal){
            $proposal=Proposal::where('stage','reject')->get();
            
            return view('partials.adminside',compact('proposal'));
        }
        public function stageone(Proposal $proposal){
            $proposal=Proposal::where('stage','stageone')->get();
            
            return view('partials.adminside',compact('proposal'));
        }
         public function stagetwo(Proposal $proposal){
            $proposal=Proposal::where('stage','stagetwo')->get();
            return view('partials.adminside',compact('proposal'));
        }
         public function newProposals(Proposal $proposal){
            $proposal=Proposal::whereNull('stage')->get();
           
            return view('partials.adminside',compact('proposal'));
        }
        public function accepted(Proposal $proposal){
            $proposal=Proposal::where('stage','Accepted')->get();
           
            return view('partials.adminside',compact('proposal'));
        }
    public function update(Request $request, proposal $proposal)
    {
        $users=auth()->user();
          

             $proposi = Proposal::where('id', $request->id)->first();

            

        
        $proposi->stage='stageone';
        
        $proposi->save();
         $users->notify(new acceptorreject($proposal));
      
        return redirect('/admin');

        }
        public function backs(){
            return redirect('/admin');
        }

    
}
