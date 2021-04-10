@extends('layouts.Admin_app')


@section('title')
    Upload Image
@endsection

@section('content')
    <form method="post" action="" enctype="multipart/form-data">
        {{csrf_field()}}
    <div class="col-lg-4">
        <div class="panel panel-primary">
            <div class="panel-heading">
                Image Info
            </div>
            <div class="panel-body">
                <div class="form-group">
                <input type="file" class="btn btn-primary" name="photo" value="upload">
                </div>
            </div>
            <div class="panel-footer">
                <input type="submit" class="btn btn-primary"  value="save">
            </div>
        </div>
    </div>
    </form>

@endsection
