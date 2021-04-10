<?php

namespace App\Http\Controllers\Admin\Main;

use App\Model\Comment;
use App\Model\Post;
use App\Model\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MainController extends Controller
{
    public function index()
    {
        $users = User::select('id','name','email')->orderBy('id','desc')->take(2)->get();
        $posts = Post::select('id','title','user_id')->orderBy('id','desc')->take(2)->get();
        $comments = Comment::orderBy('id','desc')->take(2)->get();

        return view('Admin.Main.Main_view')->with(['users'=>$users,'posts'=>$posts,'comments'=>$comments]);
    }
}
