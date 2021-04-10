<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title')</title>


    {!! Html::script("Admin/vendor/jquery/jquery.js") !!}
    {!! Html::style("Admin/vendor/bootstrap/css/bootstrap.min.css") !!}
    {!! Html::style("Admin/vendor/metisMenu/metisMenu.min.css") !!}
    {!! Html::style("Admin/vendor/datatables-responsive/dataTables.responsive.css") !!}
    {!! Html::style("Admin/vendor/datatables-plugins/dataTables.bootstrap.css") !!}
    <!-- DataTables Responsive CSS -->

    {!! Html::style("Admin/dist/css/sb-admin-2.css") !!}
    {!! Html::style("Admin/vendor/font-awesome/css/font-awesome.min.css") !!}
    <!-- Bootstrap Core CSS -->

    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>


    <!-- DataTables CSS -->


<!-- MetisMenu CSS -->
    {{--{!! Html::script("Admin/dist/js/sb-admin-2.js") !!}--}}
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.7.2/full/ckeditor.js"></script>


<!--[endif]-->

</head>

<body>

<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.html">Admin Panel</a>
        </div>
        <!-- /.navbar-header -->

        <ul class="nav navbar-top-links navbar-right">
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-envelope fa-fw"></i> <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-messages">
                    @foreach(\Illuminate\Support\Facades\Auth::user()->unReadNotifications as $notificaiton)
                        <li>
                            <a href="{{route('msg.read',['id'=>$notificaiton->id])}}">
                                <div>
                                    <strong>{{$notificaiton->data['name']}}</strong>
                                    <span class="pull-right text-muted">
                                        <em>{{$notificaiton->created_at}}</em>
                                    </span>
                                </div>
                                <div>{{$notificaiton->data['content']}}</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                    @endforeach
                    <li>
                        <a class="text-center" href="{{route('msg.index',['type'=>'all'])}}">
                            <strong>Read All Messages</strong>
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </li>
                </ul>
                <!-- /.dropdown-messages -->
            </li>

            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li><a href="{{route('web.profile')}}"><i class="fa fa-user fa-fw"></i> User Profile</a>
                    </li>
                    <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                    </li>
                    <li class="divider"></li>
                    <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
                <!-- /.dropdown-user -->
            </li>
            <!-- /.dropdown -->
        </ul>
        <!-- /.navbar-top-links -->

        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                    @if(Auth::user()->role=='admin')
                    <li>
                        <a href="{{route("section.index")}}"><i class="fa fa-table fa-fw"></i> Sections</a>
                    </li>
                     <li>
                        <a href="{{route("user.index")}}"><i class="fa fa-user fa-fw"></i> Users</a>
                     </li>
                    @endif
                    <li>
                        <a href="{{route("image.index")}}"><i class="fa fa-photo fa-fw"></i> Images</a>
                    </li>
                    <li>
                        <a href="{{route("post.index")}}"><i class="fa fa-building-o fa-fw"></i> Posts</a>
                    </li>


                </ul>
            </div>
            <!-- /.sidebar-collapse -->
        </div>
        <!-- /.navbar-static-side -->
    </nav>

    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                @if(Session::has('msg'))
                    <div class="alert alert-success" role="alert" style="margin-top: 10px;">
                        <button type="button" class="close" data-dismiss="alert">x</button>
                        <h4><i class="fa fa-check"></i> Success</h4>
                        {{Session::get('msg')}}
                    </div>
                @endif

                @if(count($errors)>0)
                    <div class="alert alert-danger" role="alert" style="margin-top: 10px;">
                        <button type="button" class="close" data-dismiss="alert">x</button>
                        <h4><i class="fa fa-ban"></i> Error</h4>
                        <ul>
                            @foreach($errors->all() as $error)
                                <li><p>{{$error}}</p></li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="col-lg-12">
                    <h1 class="page-header">@yield('title')</h1>
                </div>
                @yield('content')
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<!-- jQuery -->


            <!-- Bootstrap core JavaScript -->
            {!! Html::script("Admin/vendor/bootstrap/js/bootstrap.min.js") !!}
            {!! Html::script("Admin/vendor/metisMenu/metisMenu.min.js") !!}
            <!-- Custom scripts for this template -->
            {!! Html::script("Admin/dist/js/sb-admin-2.js") !!}
            {!! Html::script("Admin/vendor/datatables/js/jquery.dataTables.min.js") !!}
            {!! Html::script("Admin/vendor/datatables-responsive/dataTables.responsive.js") !!}
            {!! Html::script("Admin/vendor/datatables-plugins/dataTables.bootstrap.min.js") !!}



</body>

</html>
