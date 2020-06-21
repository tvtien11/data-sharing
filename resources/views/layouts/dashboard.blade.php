<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="asset/img/logo.png">
    <title>Dashboard - @yield('title')</title>

    <base href="{{asset('')}}">
    @yield('style')

</head>
<body>

<div id="wrapper">

    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">

        <ul class="nav navbar-nav navbar-left navbar-top-links">
            <li><a><i class="fa fa-home fa-fw"></i> Hospital Synchronization</a></li>
        </ul>

        <ul class="nav navbar-right navbar-top-links">
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-user fa-fw"></i> account demo <b class="caret"></b>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li>
                        <a><i class="fa fa-user fa-fw"></i> User Profile</a>
                    </li>
                    <li>
                        <a><i class="fa fa-gear fa-fw"></i> Settings</a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                    </li>
                </ul>
            </li>
        </ul>
        <!-- /.navbar-top-links -->

        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                    <li class="sidebar-search">
                        <form action="dashboard/search" method="post">
                            @csrf
                            <div class="input-group custom-search-form">
                                <input type="text" name="identity" class="form-control" placeholder="Enter identity..." required>
                                <span class="input-group-btn">
                                    <button class="btn btn-primary" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form>
                        <!-- /input-group -->
                    </li>
                    <li>
                        <a class="active"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

@yield('content')
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

@yield('script')

</body>
</html>
