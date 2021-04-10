@extends('layouts.Web_app')

@section('title')
    Main Page
@endsection

@section('headerImage')
    {{count($post->Photos)>0?url('/images/'.$post->Photos[0]->path):url('/images/home-bg.jpg')}}
@endsection

@section('subject')
    {{$post->title}}
@endsection

@section('head')
    <style>
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

@section('content')

    @auth
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <form method="post" action="">
                        {{csrf_field()}}
                        <div class="control-group">
                            <div class="form-group floating-label-form-group controls">
                                <label>Message</label>
                                <textarea rows="5" class="form-control myTextArea" placeholder="Comment" name="content" required data-validation-required-message="Please enter a message.">{{$comment->content}}</textarea>
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <br>
                        <div id="success"></div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary" id="sendMessageButton">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endauth
@endsection

