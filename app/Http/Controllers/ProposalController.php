<?php

namespace App\Http\Controllers;

use App\proposal;
use App\User;
use Illuminate\Http\Request;
use App\Notifications\acceptorreject;

class ProposalController extends Controller
{
 
     public function __construct()
        {
      
            $this->middleware('auth')->except(['index']);
        }
     
    public function index()
        {
        
          return view('proposal.index');
        }
    public function create()
      {

        
          $users=auth()->user();
      
          return view('proposal.proposal', compact('users'));
    }

    public function store( request $request)
    {
       $valid=  $this->validate(request(),['title'=>'required','organization'=>'required','Summary'=>'required','address'=>'required','phone'=>'required',
            'email'=>'required',
            'Submitted_by'=>'required',
            'Background'=>'required',
            'activities'=>'required',
            'budget'=>'required',

            ]);
       if(!$valid)
       {
            return Redirect::back()->withInput()->withErrors($valid);
       }
        
        $draft= Proposal::create([
                'title'=>request('title'),
                'organization'=>request('organization'),
                'Summary'=>request('Summary'),
                  'address'=>request('address'),
                  'phone'=>request('phone'),
                  'email'=>request('email'),
                  'Submitted_by'=>auth()->user()->email,
                  'Background'=>request('Background'),
                  'activities'=>request('activities'),
                  'budget'=>request('budget')
                
                ]);

            switch ($request->input('publish')) {
            case 'save':
                return redirect('/submitproposal');
                break;

            case 'draft':
                return redirect('/draft');
                break;

           
                }

        
    }
    public function view(proposal $proposal)
    {
        
        
       $users=auth()->user();
        $proposal = Proposal::latest()->where('Submitted_by',$users->email)->get();
       // 
       if($proposal->count()>0)
       {
      
            return view('user.user',compact('proposal','users'));
        }
        else
        {
            return view('user.empty');
        }
    }

    public function viewss(Request $request)
    {
       
          $proposalup=Proposal::where('email', $request->email)->first();
          $use=$users->is_admin;
          return view('admin.view',compact('users'));
    }

    public function open()
    {
        
        $propos = Proposal::where('id', request('id'))->get();
        return view('user.view',compact('propos'));
    }
    public function edit(proposal $proposal)
    {
        
    }

   public function Update(request $request)
   {
     $users=auth()->user();
     $proposal = Proposal::where('id', $request->id)->first();
     $proposal->stage='reject';
     $proposal->save();
     $users->notify(new acceptorreject($proposal));
       
      return redirect('/admin');
    }

    
    
}
