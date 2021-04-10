<?php

namespace App\Http\Controllers\Web\Main;

use App\Model\Section;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MainController extends Controller
{
    public function index(Request $request)
    {
        $sections = Section::all();
        $arr['sections']=$sections;
        return view('Web/Main/Main_view',$arr);
    }
}
