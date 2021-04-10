@extends('layouts.Admin_app')

@section('title')
    Display User
@endsection

@section('content')
    {{csrf_field()}}
    <div class="row">
        <div class="col-lg-12">
            <a href="{{route("user.add")}}" class="btn btn-primary" style="margin-bottom: 10px">Add User</a>

            <div class="panel panel-primary">
                <div class="panel-heading">
                    All Users
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">

                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>E-Mail</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                        <tr class="odd gradeX">
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->role}}</td>
                            <td>
                                @if(isset($user))
                                <a class="btn btn-danger" href="{{route('user.delete',['id'=>$user->id])}}">Delete</a>
                                <a class="btn btn-warning" href="{{route('user.update',['id'=>$user->id])}}">Update</a>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <!-- /.table-responsive -->
                    <script>
                        $(document).ready(function() {
                            $('#dataTables-example').DataTable({
                                responsive: true
                            });
                        });
                    </script>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
@endsection
