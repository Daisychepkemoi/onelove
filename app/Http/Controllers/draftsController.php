<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\proposal;
class draftsController extends Controller
{
    //
public function store()
    {
       $valid=  $this->validate(request(),['title'=>'required','organization'=>'required','name'=>'required','address'=>'required','phone'=>'required',
            'email'=>'required',
            'Submitted_by'=>'required',
            'Background'=>'required',
            'activities'=>'required',
            'budget'=>'required',

            ]);
       if(!$valid){
      return Redirect::back()->withInput()->withErrors($valid);
       }
        

    

       
      $ro= Proposal::create([
            'title'=>request('title'),
            'organization'=>request('organization'),
            'name'=>request('name'),
                'address'=>request('address'),
                'phone'=>request('phone'),
                'email'=>request('email'),
                'Submitted_by'=>auth()->user()->email,
                'Background'=>request('Background'),
                'activities'=>request('activities'),
                'budget'=>request('budget'),
                'draft'=>request(input('1'))
            ]);

      
        // $draft->category()->sync($request->get('offercategories', []));
        // $draft->offertype()->sync($request->get('offertypes_list', []));

        // return redirect('/admin/offers');

       dd($ro);
        // return redirect('/userproposal');
    }
}
