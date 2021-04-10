<?php

namespace App\Http\Controllers\Web\Msg;

use App\Lib\MsgContent;
use App\Model\User;
use App\Notifications\Msg;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Notification;

class MsgController extends Controller
{
    public function send(Request $request)
    {
       if($request->isMethod('post'))
       {
         switch ($request->input('to'))
         {
             case 'admin':
                 $users = User::where('role','admin')->get();
                 break;
             case 'editor':
                 $users = User::where('role','editor')->get();
                 break;
             case 'all':
                 $users = User::where('role','admin')->orWhere('role','editor')->get();
                 break;
             default:
                 $users = User::find($request->input('to'));
         }
         $msg  = new MsgContent($request->input('phone'),$request->input('email'),$request->input('content'),$request->input('name'));
        Notification::send($users,new Msg($msg));
         return redirect()->back();
       }
       else
       {
           $arr['users']=User::select('id','name')->where('role','admin')->orWhere('role','editor')->get();
           return view ('Web.Msg.Msg_view',$arr);
       }
    }
}
