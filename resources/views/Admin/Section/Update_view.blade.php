@extends('layouts.Admin_app')


@section('title')
    Update Section
@endsection

@section('content')
    <form method="post" action="">
        {{csrf_field()}}
        <div class="col-lg-4">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Section Info
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <label>Name :</label>
                        <input type="text" name="name" class="form-control" placeholder="Section Name" value="{{$section->name}}">
                    </div>

                    <div class="form-group">
                        <label>Editor For This Section :</label>
                        <select name="admin" class="form-control js-example-basic-single">
                            <option value="">Empty</option>

                            @foreach($users as $user)
                                <option value="{{$user['id']}}"> {{$user['name']}} </option>
                            @endforeach

                            @if(isset($section->user_id))
                                <option selected="selected" value="{{$section->Admin->id}}">{{$section->Admin->name}}</option>
                            @endif
                        </select>
                    </div>
                </div>
                <div class="panel-footer">
                    <input type="submit" class="btn btn-primary" value="update">
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
