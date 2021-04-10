@extends('layouts.Web_app')

@section('title')
    Contact Us
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

       .myTextArea{
           border: 1px solid #0EDAE8 !important;
           border-radius: 20px !important;
           padding: 5px !important;
       }
       .myTextArea:focus{
           border: 1px solid #0c5460 !important;
           border-radius: 20px !important;
           padding: 5px !important;
       }
   </style>
@endsection


@section('headerImage')
    {{url('/images/home-bg.jpg')}}
@endsection

@section('subject')
    Contact Us
@endsection

@section('content')
    <div class="row">
    <div class="col-md-12">

    <form action="" method="post">
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
            <div class="form-group floating-label-form-group controls">
                <label>Message</label>
                <textarea rows="5" class="form-control myTextArea" placeholder="Content" name="content" ></textarea>
                <p class="help-block text-danger"></p>
            </div>
        </div>

        <div class="form-group">
            <label>Select Group or User :</label>
            <select name="to" class="form-control js-example-basic-single">
                <option value="admin">Admin Group</option>
                <option value="editor">Editor Group</option>
                <option value="all">Admin & Editor Group</option>
                @foreach($users as $user)
                    <option value="{{$user->id}}">{{$user->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
           <button type="submit" class="btn btn-primary" >Send</button>
        </div>

        <script>
            $(document).ready(function() {
                $('.js-example-basic-single').select2();
            });
        </script>
        </form>
        </div>
    </div>
@endsection

