<?php

namespace App\Http\Controllers\Admin\Msg;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MsgController extends Controller
{
    public function index($type)
    {
        $user = Auth::user();
        switch ($type)
        {
            case 'all':
               $msgs =  $user->notifications;
                break;

            case 'read':
                $msgs =  $user->readNotifications;
                break;

            case 'unread':
                $msgs =  $user->unReadNotifications;
                break;

            default:
                return redirect()->back();
                break;

        }
        $arr['msgs'] = $msgs;
        return view('Admin.Msg.Index_view',$arr);

    }

    public function read($id)
    {
        $user = Auth::user();
        $msg =  $user->notifications->find($id);
        $msg->markAsRead();
        $arr['msg']=$msg;
        return view('Admin.Msg.Read_view',$arr);
    }

    public function delete($id)
    {
        $user = Auth::user();
        $msg = $user->notifications->find($id);
        $msg->delete();
        return redirect()->back();
    }
}
