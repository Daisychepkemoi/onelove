<?php

namespace App\Http\Controllers;
use App\Mail\welcomeagain;
use Illuminate\Http\Request;
use App\User;
use App\proposal;



class registrationController extends Controller
{
    public function __construct(){
         // $this->middleware('auth');
        $this->middleware('guest', ['except'=>'store','create']);
    }
      
    public function create()
    {
        return view('register.signin');
    }

    public function store(){

  $this->validate(request(),['name'=>'required',
'email'=>'required|email',
'password'=>'required|confirmed'
    		]);
        $user=User::create(request(['name','email','password']));
    	
        if(! ($user->verified==0)){
            return view('partials.adminside',compact('user'));
            
        }
        else{

    	auth()->login($user);

        $users=auth()->user();
        $proposal = Proposal::latest()->where('Submitted_by',$users->email)->get();
    	 // dd('jhgfcgvhb');
        return redirect('/userproposal');
    	 // return view('user.user',compact('proposal','users'));
    
}
    
    }
    public function activate(){
        $user=User::update(['verified' => 1]);
         // $verifyUser->user->verified = 1;
        $user=save();
        return redirect('/login');
    }

    }


