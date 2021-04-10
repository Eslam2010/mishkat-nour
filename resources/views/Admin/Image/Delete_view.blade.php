@extends('layouts.Admin_app')

@section('title')
    Image Delete
@endsection


@section('content')
    <form method="post" action="">
        {{csrf_field()}}
        <div class="col-lg-4">
            <div class="panel panel-red">
                <div class="panel-heading">
                    Delete Image
                </div>
                <div class="panel-body">
                    <label>Are you Sure </label>  <br/>
                    <img src="{{url('/images/'.$photo->path)}}" style="height: 100px;width: 100px;">
                </div>
                <div class="panel-footer">
                    <input type="submit" class="btn btn-danger" value="Delete">
                </div>
            </div>
        </div>
    </form>
@endsection
