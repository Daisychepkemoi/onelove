<?php

namespace App\Http\Controllers;

use App\proposal;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Notifications\acceptorreject;

class ProposalController extends Controller
{
  public $id;
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
       $valid=  $this->validate(request(),
        [
            'title'=>'required',
            'organization'=>'required',
            'Summary'=>'required',
            'address'=>'required',
            'phone'=>'required',
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
              $id=$draft->id;
            
                return redirect()->to('/submitproposal/'.$id)->with('success','Proposal Submitted Successfully');
                break;

            case 'draft':
             $id=$draft->id;
            // dd($id);
              return redirect()->to('/draft/'.$id);
                break;

           
                }

        
    }
    public function view(proposal $proposal)
    {
        
        
       $users=auth()->user();
        $proposal = Proposal::latest()->where('Submitted_by',$users->email)->OrderBy('updated_at','desc')->get();
       
       if($proposal->count()>0)
       {
      
            return view('user.user',compact('proposal','users'));
        }
        else
        {

           
            return view('user.empty', compact('users'));
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
        $users=auth()->user();
        $propos = Proposal::where('id', request('id'))->get();
        // dd($users->name);
        return view('user.view',compact('propos','users'));
    }
    public function edit(proposal $proposal)
    {
             $propos = Proposal::where('id', request('id'))->first();

        return view('user.viewed', compact('propos'));
    }

     public function finalsubmit(request $request, $id)
   {
       

        $pro=DB::table('proposals')->where('id', $request->id)->update(['draft' => false]);
              
        return redirect('/userproposal');
    }
      public function finalsubmitt(request $request, $id)
   {
       

        $pro=DB::table('proposals')->where('id', $request->id)->update(['draft' => false]);
              
        return redirect('/userproposal');
    }
    public function savedraft(request $request, $id)
    {
        $users=auth()->user();
        $pro=DB::table('proposals')->where('id', $request->id)->update(['draft' => true]);
        $proposal=Proposal::where('id', $request->id)->first();
        
       
        return redirect('/userproposal')->with('success', 'Draft saved successfully');
    }
    public function savedraftt(request $request, $id)
    {
        $users=auth()->user();
        $pro=DB::table('proposals')->where('id', $request->id)->update(['draft' => true]);
        $proposal=Proposal::where('id', $request->id)->first();
        
       
        return redirect('/userproposal')->with('success', 'Draft saved successfully');
    }
     public function destroy(request $request, $id)
    {
        $users=auth()->user();
         
           $pro=DB::table('proposals')->where('id', $request->id)->delete();
        // $proposal->delete();
         // dd($pro);
        // return redirect()->route('home')->with('success', 'Proposal deleted successfully');
        // $proposal=Proposal::where('id', $request->id)->first();
        
       
        return redirect('/userproposal')->with('success', 'Draft deleted successfully');
    }
   
     public function update(request $request)
    {
               $proposal = Proposal::where('id', $request->id)->first();
        $proposal->title=$request->get('title');
        $proposal->organization=$request->get('organization');
        $proposal->address=$request->get('address');
        $proposal->phone=$request->get('phone');
        $proposal->email=$request->get('email');
        $proposal->Submitted_by=$request->get('Submitted_by');
        $proposal->Background=$request->get('Background');
        // $proposal->summary=$request->get('summary');
        $proposal->activities=$request->get('activities');
        $proposal->Summary=$request->get('Summary');
        $proposal->budget=$request->get('budget');

        $proposal->save();
       
        $id=$proposal->id;
         switch ($request->input('save')) {
            case 'savedraft':
                // return redirect()->('/submitproposal/{id}');
            // dd($id);
                 return redirect()->to('/submittproposal/'.$id)->with('success','Proposal Submitted Successfully');
                break;

            case 'editdraft':
                // return redirect('/draft');
            // dd($id);
             return redirect()->to('/drafts/'.$id)->with('success','saved as draft Successfully');
                break;
            case 'deletedraft':
                return redirect('/deletedraft/'.$id)->with('success','Draft deleted Successfully');
                break;
                }
        
        
    }
     
    
    
}
