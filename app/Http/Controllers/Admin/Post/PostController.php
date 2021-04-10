<?php

namespace App\Http\Controllers\Admin\Post;

use App\Model\Photo;
use App\Model\Post;
use App\Model\Section;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::where('section_id','like',$this->getFlag())->get();
        $arr['posts']=$posts;
        return view('Admin.Post.Index_view',$arr);
    }

    public function add(Request $request)
    {
        $user = Auth::user();
        if ($request->isMethod('post'))
        {
          $section = Section::find($request->input('section_id'));
          if($user->can('add_post',$section)) {
              $post = $user->Posts()->create($request->all());
              $post->Photos()->attach($request->input('photos'));
              return redirect('/Admin/Post');
          }else
          {
              dd('Error No Have Permission');
          }
        }
        else
        {
            $sections = Section::where('user_id','like',$this->getFlag())->get();
            $photos  = Photo::all();
            $arr['sections'] = $sections;
            $arr['photos'] = $photos;
          return view('Admin.Post.Add_view',$arr);
        }
    }

    protected function getFlag()
    {
        $user = Auth::user();
        $flag = '%';
        if($user->role=='editor')
        {
            $flag = $user->id;
        }
        return $flag;
    }

    public function update(Request $request,$id)
    {
        $post = Post::find($id);
        $user = Auth::user();
        if($user->can('add_post',$post->Section)) {
            if ($request->isMethod('post')) {
                $post->update($request->all());
                $post->Photos()->detach();
                $post->Photos()->attach($request->input('photos'));
                return redirect()->back()->with('msg','Done');
            } else {
                $photos = Photo::all();
                $sections = Section::where('user_id', 'like', $this->getFlag())->get();
                $arr['sections'] = $sections;
                $arr['post'] = $post;
                $arr['photos'] = $photos;
                return view('Admin.Post.Update_view', $arr);
            }
        }
        else
        {
            return redirect()->back()->withErrors('Error No Have Permission');
        }
    }

    public function delete(Request $request,$id)
    {
        $user = Auth::user();
        $post = Post::find($id);
        $section = $post->Section;
        if($user->can('add_post',$section))
        {
            if($request->isMethod('post'))
            {
                 $post->delete();
                 return redirect(route('post.index'));
            }else{
                $arr['post']=$post;
                return view('Admin.Post.Delete_view',$arr);
            }
        }else
        {
            dd('Error No Have Permission');

        }
    }
}
