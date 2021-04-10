<?php

namespace App\Http\Controllers\Admin\Image;

use App\Model\Photo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ImageController extends Controller
{

    public function index()
    {
        $photos = Photo::all();
        $arr['photos']=$photos;
        return view('Admin.Image.Index_view',$arr);
    }

    public function add(Request $request)
    {
        $input = $request->all();
        if($request->isMethod('post'))
        {
           $image = $input['photo'];
           $path = $image->storeAs('post',$image->getClientOriginalName(),'images');
           Photo::create([
               'path'=>$path
           ]);
          return redirect()->back();
        }
        else
        {
            return view('Admin.Image.Add_view');
        }

    }

    public function delete(Request $request,$id)
    {
        $photo = Photo::find($id);
        if($request->isMethod('post'))
        {
            try{
            unlink(public_path('/images/'.$photo->path));
            $photo->delete();
            return redirect(route('image.index'));
            }catch (\Exception $e)
            {
                return $e->getMessage();
            }
        }
        else
        {
            $arr['photo']=$photo;
            return view('Admin.Image.Delete_view',$arr);
        }
    }

}
