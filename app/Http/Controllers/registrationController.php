<?php

namespace App\Http\Controllers;
use App\Mail\welcomeagain;
use Illuminate\Http\Request;
use App\User;
use App\proposal;



class registrationController extends Controller
{
    public function __construct()
    {
         // $this->middleware('auth');
        $this->middleware('guest', ['except'=>'activate','create','store']);
    }
      
    public function create()
    {
        return view('register.signin');
    }

    public function store( Request $request)
    {

         $this->validate(request(),['name'=>'required',
                'email'=>'required|email',
                'password'=>'required|confirmed'
    		]);
        $user=User::create(request(['name','email','password']));

    	
        if(! ($user->verified==1))
        {
                    auth()->login($user);
            $users=User::where('email', $request->email)->get();
         
    
                \Mail::to($users)->send(new welcomeagain($users));
                // dd($users->name);
            return view('session.unverified',compact('users'));

            
        }
        else
        {

    	auth()->login($user);

        $users=auth()->user();
        $proposal = Proposal::latest()->where('Submitted_by',$users->email)->get();
    	 
        return redirect('/userproposal');
    	 
    
        }
    
    }
    public function update(request $request)
    {



         $user=User::where('id', $request->id)->first();

         $user->verified=1;
       
        $user->save();
       // dd($user);
        return redirect('/login')->with('message', 'Account successfully activated!');
    }
    public function activate(request $request)
    {
         $user=auth()->user();

        return view('email.welcome',compact('user'));
    }

 }


