@extends('layouts.Admin_app')


@section('title')
    Read Msg
@endsection

@section('content')
    <form method="post" action="">
        {{csrf_field()}}
    <div class="col-lg-4">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="form-group">
                <div class="pull-left">
                    {{$msg->data['name']}}  |  {{$msg->data['email']}}
                </div>
                <div class="pull-right">
                    {{$msg->data['phone']}}
                </div>
                </div>
            </div>
            <div class="panel-body">
                  {!! str_replace(array("\n"),"<br>",$msg->data['content']) !!}
            </div>
            <div class="panel-footer">
                <a class="btn btn-primary" href="{{route('msg.index',['type'=>'all'])}}">Back</a>
            </div>
        </div>
    </div>
    </form>

@endsection
