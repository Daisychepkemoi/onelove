<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\proposal;

class sessionsController extends Controller
{

    public function __construct()
    {
        // $this->middleware('auth', ['except'=>'destroy']);
    }
      
    public function create()
    {
        return view('session.create');
    }
    public function store()
    {
       
        if ( auth()->attempt(request(['email', 'password']))== false) 
        {
            return back()->withErrors([
                'message' => 'The email or password is incorrect, please try again'
            ]);
        }
        else
        {
            $request=request();
             $users = User::where('email', $request->email)->first();
             $use=$users->is_admin;

            
           if($use == true) 
           {
             
            
            return redirect('/admin');
           }
           else
           {
                
             if(! ($users->verified==1))
                {
                     auth()->login($users);
                     $users=User::where('email', $request->email)->get();
                            
                     return view('session.unverified',compact('users'));
                                
                }
             else
                {

                 auth()->login($users);

                 $users=auth()->user();
                 $proposal = Proposal::latest()->where('Submitted_by',$users->email)->get();
                 return redirect('/userproposal');
                }
           
            }
        }
        
        
    }

   public function destroy()
    {
        auth()->logout();
        
        return redirect('/');
    }
}


