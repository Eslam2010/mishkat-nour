@extends('layouts.Web_app')

@section('title')
    Main Page
@endsection

@section('head')
   <style>
       .mytext{
           border: 1px solid #0EDAE8 !important;
           border-radius: 10px !important;
           padding: 5px !important;
       }
       .mytext:focus{
           border: 1px solid #0c5460 !important;
           border-radius: 10px !important;
           padding: 5px !important;
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
    <div class="col-md-12">
     
    <form action="{{route('register')}}" method="post">
    {{csrf_field()}}
        <div class="control-group">
            <div class="form-group ">
                 <label>Name : </label>
                <input type="text" class="form-control mytext" name="name" placeholder="Name" >
            </div>
        </div>

        <div class="control-group">
            <div class="form-group ">
                <label>Email Address : </label>
                <input type="email" name="email" class="form-control mytext" placeholder="Email Address" >
            </div>
        </div>

        <div class="control-group">
            <div class="form-group ">
                <label>Phone : </label>
                <input type="text" name="phone" class="form-control mytext" placeholder="Phone Number" >
            </div>
        </div>

        <div class="control-group">
            <div class="form-group ">
                <label>Password : </label>
                <input type="password" name="password" class="form-control mytext" placeholder="Password" >
            </div>
        </div>

        <div class="control-group">
            <div class="form-group ">
                <label>Confirm Password : </label>
                <input type="password" name="password_confirmation" class="form-control mytext" placeholder="Confirm Password" >
            </div>
        </div>
        <div class="form-group">
           <button type="submit" class="btn btn-primary" >Register</button>
        </div>
        </form>
        </div>
    </div>
@endsection

