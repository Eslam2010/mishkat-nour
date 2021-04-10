<?php

namespace App\Http\Controllers\Admin\User;

use App\Model\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
       $users = User::all();
       $arr['users']=$users;
       return view('Admin.User.Index_view',$arr);
    }

    public function add(Request $request)
    {
        if($request->isMethod('post'))
        {
        $input  = $request->only('name','email','phone');
        $input['role']='user';
        $input['password']=Hash::make($request->input('password'));
        $user =User::create($input);
        return redirect()->back();
      }
      else
      {
        return view('Admin.User.Add_view');
      }
    }

    public function update(Request $request,$id)
    {
        $user = User::find($id);
        if($request->isMethod('post'))
        {
            $input  = $request->only('name','email','phone');
            if(!is_null($request->input('password')))
            {
                $input['password']=Hash::make($request->input('password'));

            }
            $user->update($input);
            return redirect(route('user.index'));
        }
        else
        {
         $arr['user'] = $user;
         return view('Admin.User.Update_view',$arr);
        }
    }

    public function delete(Request $request,$id)
    {
        $user = User::find($id);
        if($request->isMethod('post'))
        {
          $user->delete();
            return redirect(route('user.index'));
        }
        else
        {
            $arr['user'] = $user;
            return view('Admin.User.Delete_view',$arr);
        }
    }
}
