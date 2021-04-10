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

        .comment{
            margin: 20px;
            padding: 20px;
            border: #0c5460 solid 1px;
            border-radius: 20px;
            word-wrap: break-word;
                }

        .comment  .user-name{
            width: 75px;
            height: 75px;
            background-color: #0c5460;
            color: white;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
                }
        .control
           {
              font-size: 10px;
           }
        .footer{
                font-size: 12px;
                color: #a0a0a0;
                margin-left: auto;
                margin-right: 0px;
               }
    </style>
@endsection

@section('content')
    <article>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    {!!$post->content!!}
                    <div class="row">
                    @foreach($post->Photos as $photo)
                            <div class="col-md-3">
                                <img src="{{url('/images/'.$photo->path)}}" style="width: 150px;height: 150px" >
                            </div>
                    @endforeach
                    </div>
                </div>
            </div>
        </div>
    </article>
    @auth
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <form method="post" action="">
                    {{csrf_field()}}
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <label>Message</label>
                            <textarea rows="5" class="form-control myTextArea" placeholder="Comment" name="content" required data-validation-required-message="Please enter a message."></textarea>
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
    <div class="row">
        <div class="col-md-12">
            @foreach($comments as $comment)
            <div class="row comment">
                <div class="col-md-2">
                    <div class="user-name">
                        <label>{{$comment->User->name}}</label>
                    </div>
                </div>
                <div class="col-md-8">
                    {!! str_replace(array("\n"),'<br>',$comment->content) !!}
                </div>
                @if($comment->User->id==Auth::user()->id or Auth::user()->role=='admin' or Auth::user()->id == $post->Section->user_id)
                <div class="col-md-2">
                    <div class="control">
                        <a href="{{route('web.comment.edit',['id'=>$comment->id])}}">Edit</a> |
                        <a href="#" onclick="deleteComment('{{route('web.comment.delete',['id'=>$comment->id])}}')">Delete</a>
                    </div>
                </div>
                @endif
                <div class="footer">
                 {{$comment->created_at}}
                </div>

            </div>
            @endforeach
        </div>
        <script>
            function deleteComment($url) {
             var result  =confirm('Are You Sure ?');
             if(result)
             {
                 window.location.href=$url;
             }
            }
        </script>
    </div>
    @endauth
@endsection

