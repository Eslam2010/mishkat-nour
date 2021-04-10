@extends('layouts.Web_app')

@section('title')
    Login Page
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
    Login
@endsection

@section('content')
    <div class="row">
    <div class="col-md-12">

    <form action="{{route('login')}}" method="post">
    {{csrf_field()}}
        <div class="control-group">


        <div class="control-group">
            <div class="form-group ">
                <label>Email Address : </label>
                <input type="email" name="email" class="form-control mytext @error('email') is-invalid @enderror" placeholder="Email Address" >
                @error('email')
                <span class="invalid-feedback" role="alert">
                   <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>



        <div class="control-group">
            <div class="form-group ">
                <label>Password : </label>
                <input type="password" name="password" class="form-control mytext @error('password') is-invalid @enderror" placeholder="Password" >
                @error('password')
                <span class="invalid-feedback" role="alert">
                   <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>


        <div class="form-group">
           <button type="submit" class="btn btn-primary" >Login</button>
        </div>
        </div>
        </form>

        </div>
    </div>
@endsection

