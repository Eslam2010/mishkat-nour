@extends('layouts.Admin_app')

@section('title')
Admin Panel
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Last 2 users
                </div>
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>E-Mail</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr class="odd gradeX">
                                <td><a href="{{route('user.update',['id'=>$user->id])}}">{{$user->name}}</a></td>
                                <td>{{$user->email}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>

            </div>
        </div>

        <div class="col-lg-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Last 2 posts
                </div>
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                        <tr>
                            <th>User</th>
                            <th>Post-Title</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($posts as $post)
                            <tr class="odd gradeX">
                                <td><a href="{{route('user.update',['id'=>$post->User->id])}}">{{$post->User->name}}</a></td>
                                <td><a href="{{route('post.update',['id'=>$post->id])}}">{{$post->title}}</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>

            </div>
        </div>

        <div class="col-lg-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Last 2 Comment
                </div>
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                        <tr>
                            <th>User</th>
                            <th>Post</th>
                            <th>Comment</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($comments as $comment)
                            <tr class="odd gradeX">
                                <td><a href="{{route('user.update',['id'=>$comment->User->id])}}">{{$comment->User->name}}</a></td>
                                <td><a href="{{route('post.update',['id'=>$comment->Post->id])}}">{{$comment->Post->title}}</a></td>
                                <td><a href="{{route('web.comment.edit',['id'=>$comment->id])}}">{{$comment->content}}</a></td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>

            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('.dataTables-example').DataTable({
                responsive: true
            });
        });
    </script>

@endsection
