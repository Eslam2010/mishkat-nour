@extends('layouts.Admin_app')

@section('title')
    Display Msg
@endsection

@section('content')
    {{csrf_field()}}
    <div class="row">
        <div class="col-lg-12">
            <a href="{{route("msg.index",['type'=>'all'])}}" class="btn btn-primary" style="margin-bottom: 10px">All</a>
            <a href="{{route("msg.index",['type'=>'read'])}}" class="btn btn-primary" style="margin-bottom: 10px">Read</a>
            <a href="{{route("msg.index",['type'=>'unread'])}}" class="btn btn-primary" style="margin-bottom: 10px">UnRead</a>

            <div class="panel panel-primary">
                <div class="panel-heading">
                    MSG
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">

                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                        <tr>
                            <th></th>
                            <th>Name</th>
                            <th>E-Mail</th>
                            <th>Phone</th>
                            <th>Read at</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($msgs as $msg)
                        <tr class="odd gradeX">
                            <td><i class="fa fa-envelope{{is_null($msg->read_at)?'':'-o'}}"></i></td>
                            <td>{{$msg->data['name']}}</td>
                            <td>{{$msg->data['email']}}</td>
                            <td>{{$msg->data['phone']}}</td>
                            <td>{{$msg->read_at}}</td>

                            <form action="{{route('msg.delete',['id'=>$msg->id])}}" method="post" id="deleteForm-{{$msg->id}}">
                                @csrf
                            </form>
                            <td>
                                @if(isset($msg))
                                <a class="btn btn-danger" href="{{route('msg.delete',['id'=>$msg->id])}}" onclick="deleteNoti('{{$msg->id}}')">Delete</a>
                                <a class="btn btn-primary" href="{{route('msg.read',['id'=>$msg->id])}}">Read</a>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <!-- /.table-responsive -->
                    <script>
                        function deleteNoti($id){
                          event.preventDefault();
                          var $flag = confirm("Are You Sure ?");
                          if($flag)
                          {
                              document.getElementById('deleteForm-'+$id).submit();
                          }
                        }
                    </script>
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
