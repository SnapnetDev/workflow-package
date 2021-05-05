<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    //

    function changePassword(){
         
      return view('user.change_password');   
    }

    function changePasswordAction(User $user,Request $request){
        
        $data = $request->all();

        if ($data['password'] == $data['password_confirm'] && !empty($data['password'])){
          $user->update([
            'password'=>Hash::make($data['password'])
          ]);   
          $message = 'Passwords changed successfully.';
        }else{
          $message = 'Invalid Password!';
        }
        
    	return redirect('change-password/' . $user->id)->with(['message'=>$message]);

    }

}
