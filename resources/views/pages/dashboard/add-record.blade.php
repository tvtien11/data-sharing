@extends('layouts.dashboard')

@section('title', 'Add Patient')

@section('style')
    <!-- Bootstrap Core CSS -->
    <link href="asset/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="asset/css/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="asset/css/startmin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="asset/css/font-awesome.min.css" rel="stylesheet" type="text/css">
@endsection

@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Patient information</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row">
                <div class="col-lg-7">
                    <div class="panel panel-default ">
                        <div class="panel-heading">
                            <i class="fa fa-info-circle fa-fw"></i> Patient information:
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="list-group">
                                <a class="list-group-item">
                                    <i class="fa fa-user fa-fw"></i> Full name
                                    <span class="pull-right text-muted small">{{$patient->full_name}}</span>
                                </a>
                                <a class="list-group-item">
                                    <i class="fa fa-location-arrow fa-fw"></i> Address
                                    <span class="pull-right text-muted small">
                                        {{$patient->ward->_name}} - {{$patient->district->_name}} - {{$patient->province->_name}}
                                    </span>
                                </a>
                                <a class="list-group-item">
                                    <i class="fa fa-intersex fa-fw"></i> Sex
                                    <span class="pull-right text-muted small">{{$patient->sex}}</span>
                                </a>
                                <a class="list-group-item">
                                    <i class="fa fa-mobile fa-fw"></i> Phone number
                                    <span class="pull-right text-muted small">{{$patient->phone}}</span>
                                </a>
                                <a class="list-group-item">
                                    <i class="fa fa-users fa-fw"></i> Ethnic Group
                                    <span class="pull-right text-muted small">{{$patient->ethnic->_name}}</span>
                                </a>
                                <a class="list-group-item">
                                    <i class="fa fa-bolt fa-fw"></i> Job
                                    <span class="pull-right text-muted small">{{$patient->job}}</span>
                                </a>
                                <a class="list-group-item">
                                    <i class="fa fa-hospital-o fa-fw"></i>
                                    <span class="pull-right text-muted small">Data from {{$patient->id_hospital}}</span>
                                </a>
                            </div>
                            <!-- /.list-group -->
                            <a href="#" class="btn btn-default btn-block">I want to update</a>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <div class="col-lg-5">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Form upload record
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form role="form" action="dashboard/add-record" method="post"
                                          enctype="multipart/form-data">
                                        @csrf
                                        <input type="number" name="idPatient" value="{{$patient->id}}" hidden>
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" name="name" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Upload record</label>
                                            <input type="file" name="record" id="record" required>
                                        </div>
                                        <button type="submit" class="btn btn-default">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
            <!-- /.row -->
            <div class="row">
                @foreach($records as $r)
                    <div class="col-lg-3">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                {{$r->name}}
                            </div>
                            <div class="panel-body">
                                <img src="asset/img/file.png">
                            </div>
                            <div class="panel-footer">
                                <a href="http://docs.google.com/gview?url=http://localhost/data-sharing/public/upload/2.-Benh-an-Nhi-khoa.doc"><input type="button" value="Open" /></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
@endsection


@section('script')
    <!-- jQuery -->
    <script src="asset/js/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="asset/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="asset/js/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="asset/js/startmin.js"></script>
@endsection
