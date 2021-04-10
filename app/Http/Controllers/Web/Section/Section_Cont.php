<?php

namespace App\Http\Controllers\Web\Section;

use App\Model\Section;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Section_Cont extends Controller
{
    public function index($id)
    {
        $section = Section::find($id);
        $posts = $section->Posts;
        $arr['posts'] = $posts;
        return view('Web.Section.Index_view',$arr);
    }
}
