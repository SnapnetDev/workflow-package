<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class UserProfileController extends Controller
{
    //

    function profile(User $user){ //name,sex,dob,age,address   
       return view('user.profile',[
         'user'=>$user
       ]);
    }

    function profileAction(User $user,Request $request){
      $data = $request->all();
      $user->update([
        'name'=>$data['name'],
        'sex'=>$data['sex'],
        'dob'=>$data['dob'],
        'address'=>$data['address']
      ]);
      $message = 'Profile Saved';
//       $this->authorize()
      return redirect('user-profile/' . $user->id)->with(['message'=>$message]);
    }


}
