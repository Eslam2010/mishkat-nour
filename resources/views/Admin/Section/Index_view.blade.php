@extends('layouts.Admin_app')

@section('title')
    Display Sections
@endsection

@section('content')
    {{csrf_field()}}
    <div class="row">
        <div class="col-lg-12">
            <a href="{{route("section.add")}}" class="btn btn-primary" style="margin-bottom: 10px">Add Section</a>

            <div class="panel panel-primary">
                <div class="panel-heading">
                    All Sections
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">

                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Admin</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($sections as $section)
                        <tr class="odd gradeX">
                            <td>{{$section->name}}</td>
                            <td>{{is_null($section->User->name)?'':$section->User->name }}</td>
                            <td>
                                @if(isset($section))
                                <a class="btn btn-danger" href="{{route('section.delete',['id'=>$section->id])}}">Delete</a>
                                <a class="btn btn-warning" href="{{route('section.update',['id'=>$section->id])}}">Update</a>
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
