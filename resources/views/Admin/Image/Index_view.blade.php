@extends('layouts.Admin_app')

@section('title')
    Display Image
@endsection

@section('content')
    {{csrf_field()}}
    <div class="row">
        <div class="col-lg-12">
            <a href="{{route("image.add")}}" class="btn btn-primary" style="margin-bottom: 10px">Add Image</a>

            <div class="panel panel-primary">
                <div class="panel-heading">
                    Images
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    @foreach($photos as $photo)
                        <a href="{{route('image.delete',['id'=>$photo->id])}}"><td><img src="{{url('/images/'.$photo->path)}}" style="width:100px;height: 100px"></td></a>
                    @endforeach
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
@endsection
