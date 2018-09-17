<?php

namespace App\Http\Controllers;

use App\proposal;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
// use App\Notifications\acceptorreject;
use App\Notifications\adminnotify;
use App\Http\Controllers\Notification;

class ProposalsController extends Controller
{
    public $id;
    public function __construct()
    {
        $this->middleware('auth')->except(['index','activate','activatepage']);
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

    public function store(request $request)
    {
        $valid=  $this->validate(
         request(),
         [
            'title'=>'required',
            'organization'=>'required',
            'summary'=>'required',
            'address'=>'required',
            'phone'=>'required',
            'email'=>'required',
            'submitted_by'=>'required',
            'background'=>'required',
            'activities'=>'required',
            'budget'=>'required',

        ]
    );

        
        $draft= Proposal::create([
            'title'=>request('title'),
            'organization'=>request('organization'),
            'summary'=>request('summary'),
            'address'=>request('address'),
            'phone'=>request('phone'),
            'email'=>request('email'),
            'submitted_by'=>auth()->user()->email,
            'background'=>request('background'),
            'activities'=>request('activities'),
            'budget'=>request('budget')

        ]);

        switch ($request->input('publish')) {
            case 'save':
            $id=$draft->id;

            // $users=DB::table('Users')->where('is_admin', true)->first();
            // $proposal=DB::table('proposals')->where('id', $id)->first();
            // \Notification::send($users, new adminnotify($proposal));
                        // dd($draft->id);
            return redirect()->to('/submitproposal/'.$id)->with('success', 'Proposal Submitted Successfully');
            break;

            case 'draft':
            $id=$draft->id;

            return redirect()->to('/draft/'.$id);
            break;


        }
    }
    public function view(proposal $proposal)
    {
        $users=auth()->user();
        $proposal = Proposal::latest()->where('submitted_by', $users->email)->OrderBy('updated_at', 'desc')->get();
        $proposa=Proposal::where('draft', $proposal->draft=false)->orderBy('updated_at', 'desc')->get();

        if ($proposal->count()>0) {
            return view('user.user', compact('proposal', 'users', 'proposa'));
        } else {
            return view('user.empty', compact('users', 'proposa'));
        }
    }

    public function open($id)
    {
        $users=auth()->user();
        $propos = Proposal::where('id', request('id'))->first();
        // dd($propos);
        return view('user.view', compact('propos', 'users'));
    }


    public function finalsubmit(request $request, $id)
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
    public function destroy(request $request, $id)
    {
        $users=auth()->user();

        $pro=DB::table('proposals')->where('id', $request->id)->delete();
        
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
        $proposal->submitted_by=$request->get('submitted_by');
        $proposal->background=$request->get('background');
        $proposal->activities=$request->get('activities');
        $proposal->summary=$request->get('summary');
        $proposal->budget=$request->get('budget');

        $proposal->save();

        $id=$proposal->id;
        switch ($request->input('save')) {
            case 'savedraft':


            return redirect()->to('/submitproposal/'.$id)->with('success', 'Proposal Submitted Successfully');
            break;

            case 'editdraft':

            return redirect()->to('/draft/'.$id)->with('success', 'saved as draft Successfully');
            break;
            case 'deletedraft':
            return redirect('/deletedraft/'.$id)->with('success', 'Draft deleted Successfully');
            break;
        }
    }
    public function activatepage(request $request)
    {
        $user=auth()->user();

        return view('email.welcome', compact('user'));
    }
    public function activate(request $request)
    {
        $pro=DB::table('users')->where('id', $request->id)->update(['verified' => true]);

        return redirect()->route('login')->with('message', 'Account successfully activated!');
    }
    public function rejected(Proposal $proposal)
    {

        $users=auth()->user();
        $user=$users->email;
        $proposal = Proposal::where('submitted_by', $user)->where('stage', 'reject')->orderBy('updated_at','desc')->get();

        return view('user.user',compact('proposal','users'));
    }
    public function stageoneuser(Proposal $proposal)
    {
        $users=auth()->user();
        $user=$users->email;

        $proposal=Proposal::where('submitted_by', $user)->where('stage','stageone')->orderBy('updated_at','desc')->get();

        return view('user.user',compact('proposal','users'));
    }
    public function userdrafts(Proposal $proposal)
    {
        $users=auth()->user();
        $user=$users->email;

        $proposal=Proposal::where('submitted_by', $user)->where('draft',1)->orderBy('updated_at','desc')->get();

        return view('user.user',compact('proposal','users'));
    }
    public function stagetwouser(Proposal $proposal)
    {
        $users=auth()->user();
        $user=$users->email;
        $proposal=Proposal::where('submitted_by', $user)->where('stage','stagetwo')->orderBy('updated_at','desc')->get();
        return view('user.user',compact('proposal','users'));
    }
    public function newProposals(Proposal $proposal)
    {
        $users=auth()->user();
        $user=$users->email;
        $proposal=Proposal::where('submitted_by', $user)->whereNull('stage')->orderBy('updated_at','desc')->get();

        return view('user.user',compact('proposal','users'));
    }
    public function accepteduser(Proposal $proposal)
    {

        $users=auth()->user();
        $user=$users->email;
        $proposal=Proposal::where('submitted_by', $user)->where('stage','Accepted')->orderBy('updated_at','desc')->get();

        return view('user.user',compact('proposal','users'));
    }
    public function userback()
    {
        return redirect('/userproposal');
    }

}


