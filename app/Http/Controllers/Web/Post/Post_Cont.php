<?php

namespace App\Http\Controllers\Web\Post;

use App\Model\Comment;
use App\Model\Post;
use App\Model\Section;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class Post_Cont extends Controller
{
    public function index(Request $request,$id)
    {
        $post = Post::find($id);
        if($request->isMethod('post'))
        {
            $post->Comments()->create([
                'content'=>$request->input('content'),
                'user_id'=>Auth::user()->id
            ]);
            return redirect()->back();
        }else{
            $arr['post'] = $post;
            $arr['comments'] = $post->Comments;
            return view('Web.Post.Index_view',$arr);
        }

    }

    public function editComment(Request $request,$id)
    {
       $comment = Comment::find($id);
       $user = Auth::user();
       $section = $comment->Post->Section;
       $post = $comment->Post;
       if($user->can('EditComment',$comment) or $user->can('add_post',$section))
       {
           if($request->isMethod('post'))
           {
              $comment->update([
                 'content'=>$request->input('content'),
              ]);
              return redirect(route('web.post.index',['id'=>$post->id]));
           }
           else
           {
               $arr['comment']=$comment;
               $arr['post']=$post;
             return view('Web.Post.edit_comment_view',$arr);
           }
       }
    }


    public function deleteComment($id)
    {
        $comment = Comment::find($id);
        $user = Auth::user();
        $section = $comment->Post->Section;
        if ($user->can('EditComment', $comment) or $user->can('add_post', $section)) {
            $comment->delete();
             return redirect()->back();
        }
    }

}
