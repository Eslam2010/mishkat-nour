@extends('layouts.Admin_app')

@section('title')
    Section Delete
@endsection


@section('content')
    <form method="post" action="">
        {{csrf_field()}}
        <div class="col-lg-4">
            <div class="panel panel-red">
                <div class="panel-heading">
                    Delete
                </div>
                <div class="panel-body">
                    <label>Are you Sure </label>  <br/>
                    <span style="color: darkred;font-size: large">{{$section->name}}</span>
                </div>
                <div class="panel-footer">
                    <input type="submit" class="btn btn-danger" value="save">
                </div>
            </div>
        </div>

    </form>
@endsection
