<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Proposal;
use App\Notifications\AcceptOrReject;
use Illuminate\Support\Facades\DB;


class adminController extends Controller
{
     
     public function __construct()
        {
    
            $this->middleware('auth');
        }
    public function create(Proposal $proposal)
        {
    	    $users=auth()->user();
    	   $proposal=Proposal::where('draft',$proposal->draft=false)->orderBy('updated_at','desc')->get();
    	
    	   return view('partials.adminside',compact('proposal','users'));
         }
    public function show(Proposal $proposal)
        {
    	   $users=auth()->user();
    	    $propos = Proposal::where('id', request('id'))->where('draft',$proposal->draft=false)->get();
         

    	   return  view('admin.move',compact('propos','users'));
    	
         }

     public function rejected(Proposal $proposal)
        {   
            $users=auth()->user();
            $proposal=Proposal::where('stage','reject')->where('draft',$proposal->draft=false)->orderBy('updated_at','desc')->get();
            
            return view('partials.adminside',compact('proposal','users'));
        }
     public function stageone(Proposal $proposal)
        {   
            $users=auth()->user();
            $proposal=Proposal::where('stage','stageone')->where('draft',$proposal->draft=false)->orderBy('updated_at','desc')->get();
            
            return view('partials.adminside',compact('proposal','users'));
        }
     public function stagetwo(Proposal $proposal)
        {   
            $users=auth()->user();
            $proposal=Proposal::where('stage','stagetwo')->where('draft',$proposal->draft=false)->orderBy('updated_at','desc')->get();
            return view('partials.adminside',compact('proposal','users'));
        }
    public function newProposals(Proposal $proposal)
        {
            $users=auth()->user();
            $proposal=Proposal::whereNull('stage')->where('draft',$proposal->draft=false)->orderBy('updated_at','desc')->get();
           
            return view('partials.adminside',compact('proposal','users'));
        }
        
    public function accepted(Proposal $proposal)
        {   
            $users=auth()->user();
            $proposal=Proposal::where('stage','Accepted')->where('draft',$proposal->draft=false)->orderBy('updated_at','desc')->get();
           
            return view('partials.adminside',compact('proposal','users'));
        }
    public function stage1(Request $request, proposal $proposal,$id)
        {   
             $users=auth()->user();
           $pro=DB::table('proposals')->where('id', $request->id)->update(['stage' => 'stageone']);
            $users->notify(new AcceptOrReject($proposal));
         

        return redirect('/admin')->with('success', 'Proposal moved to stage one successfully');
           

        }
    public function backs()
        {
            return redirect('/admin');
        }
    public function reject(request $request, $id,Proposal $proposal)
    {   
        $users=auth()->user();
          
   
        $pro=DB::table('proposals')->where('id', $request->id)->update(['stage' => 'reject']);
        
       $users->notify(new AcceptOrReject($proposal));
        
        return redirect('/admin')->with('success', 'Proposal rejected successfully');

    }
     public function stage2(request $request, $id,Proposal $proposal)
    {
        $users=auth()->user();
        $pro=DB::table('proposals')->where('id', $request->id)->update(['stage' => 'stagetwo']);
        
       $users->notify(new AcceptOrReject($proposal));
        return redirect('/admin')->with('success', 'Proposal moved to stage two successfully');
    }
     public function accept(request $request, $id,Proposal $proposal)
    {
        $users=auth()->user();
        $pro=DB::table('proposals')->where('id', $request->id)->update(['stage' => 'Accepted']);
        
       $users->notify(new AcceptOrReject($proposal));
        return redirect('/admin')->with('success', 'Proposal accepted successfully');
    }
    
    
}
