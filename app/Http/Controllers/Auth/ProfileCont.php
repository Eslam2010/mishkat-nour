<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileCont extends Controller
{
    public function update(Request $request)
    {
        $user = Auth::user();
        if($request->isMethod('post'))
        {
          if($this->Check($request->input('c-password')))
          {
              $user->update([
                  'name'=>$request->input('name'),
                  'phone'=>$request->input('phone'),
              ]);

              if(!is_null($request->input('password')) and $request->input('password')==$request->input('password_confirmation'))
                  {
                      $user->password = Hash::make($request->input('password'));
                  }
              return redirect()->back();
          }
          else
          {
              dd('error');
          }
        }
        else
        {
            $arr['user'] = $user;
                return view('Web.Auth.Profile_view',$arr);
        }

    }

    protected function Check($password)
    {
        if(Hash::check($password,Auth::user()->getAuthPassword()))
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}
