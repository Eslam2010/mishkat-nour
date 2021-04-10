<?php

namespace App\Http\Controllers\Admin\Section;

use App\Model\Section;
use App\Model\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SectionController extends Controller
{
    public function index(Request $request)
    {
        $sections = Section::all();
        $arr['sections']=$sections;
        return view('Admin.Section.Index_view',$arr);
    }

    public function add(Request $request)
    {
        if($request->isMethod('post'))
        {
            $section = Section::create([
                'name'=>$request->input('name'),
                'user_id'=>$request->input('user_id')
            ]);
            if(!is_null($request->input('user_id')))
            {
                $user=User::find($request->input('user_id'));
                $user->role='editor';
                $user->update();
            }
            return redirect()->back();
        }
        else
        {
            $users=User::select('id','name')->where('role','user')->get();
            $arr['users']=$users;
            return view('Admin.Section.Add_view',$arr);
        }

    }

    public function update(Request $request,$id)
    {
        $input = $request->all();
        $section = Section::findOrFail($id);
        if($request->isMethod('post'))
        {
             $section->name = $input['name'];
             if(is_null($input['admin']) or $section->user_id != $input['admin'] )
             {
                 if(isset($section->user_id)) {
                     $old_admin = User::find($section->user_id);
                     $old_admin->role = 'user';
                     $old_admin->update();
                 }
                 $section->user_id = $input['admin'];
                 if(!is_null($input['admin']))
                 {
                     $admin = User::find($input['admin']);
                     $admin->role = 'editor';
                     $admin->update();
                 }
             }
             $section->update();
             return redirect()->back();
        }
        else
        {

            $users=User::select('id','name')->where('role','user')->get();

                $arr['users'] = $users;

            $arr['section']=$section;
            return view('Admin.Section.Update_view',$arr);

        }

    }

    public function delete(Request $request,$id)
    {
        $section = Section::find($id);
        if ($request->isMethod('post'))
        {
            $section->delete();
            return redirect(route('section.index'));
        }
        else {
            $arr['section']=$section;
            return view('Admin.Section.Delete_view',$arr);
        }
    }

}
