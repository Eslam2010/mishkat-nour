@extends('layouts.Web_app')

@section('title')
    Main Page
@endsection

@section('head')
   <style>
       .block {
           padding: 30px;
           margin: 30px;
           border: #0b2e13 1px dashed;
           border-radius: 20px;
           width: 100%;
       }
       .block:hover {
          background-color: #0c5460;
          color:white;
       }
   </style>
@endsection


@section('headerImage')
    {{url('/images/home-bg.jpg')}}
@endsection

@section('subject')
    Welcome
@endsection

@section('content')
    <div class="row">
        @foreach($sections as $section)
        <div class="col-md-4">
            <a href="{{route('web.section.index',['id'=>$section->id])}}">
                <div class="block">
                      <label>{{$section->name}}</label>
                </div>
            </a>
        </div>
         @endforeach
    </div>
@endsection

