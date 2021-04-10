@extends('layouts.Admin_app')


@section('title')
    Add Post
@endsection

@section('content')
    <form method="post" action="">
        {{csrf_field()}}
    <div class="col-lg-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                Post Info
            </div>
            <div class="panel-body">
                    <div class="form-group">
                      <label>Title :</label>
                      <input type="text" name="title" class="form-control" placeholder="Title">
                    </div>

                    <div class="form-group">
                        <label>Content :</label>
                        <textarea class="form-control ckeditor" name="content" placeholder="Content"></textarea>
                    </div>

                <div class="form-group">
                    <label>Section :</label>
                    <select name="section_id" class="js-example-basic-single form-control">
                        @foreach($sections as $section)
                        <option value="{{$section->id}}">{{$section->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="panel-footer">
                <input type="submit" class="btn btn-primary" value="save">
            </div>
        </div>
    </div>

    <div class="col-lg-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Post Info
                </div>
                <div class="panel-body">
                    <div class="row">

                            @foreach($photos as $photo)
                              <div class="col-md-4">
                                <img src="{{url('images/'.$photo->path)}}" style="width: 150px;height: 150px;margin: 10px" alt="" onclick="alert('{{url('/images/'.$photo->path)}}')">
                                <input type="checkbox" name="photos[]"  value="{{$photo->id}}">
                              </div>
                            @endforeach

                    </div>

                </div>
            </div>
        </div>
        <script>
            $(document).ready(function() {
                $('.js-example-basic-single').select2();
            });
        </script>
    </form>

@endsection
