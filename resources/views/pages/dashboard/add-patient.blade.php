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

    <meta name="csrf-token" content="{{ csrf_token() }}"/>
@endsection

@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Add new patient information</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Form add new patient information
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-2"></div>
                                <div class="col-lg-8">
                                    <form role="form" action="dashboard/add-patient" method="post">
                                        @csrf
                                        <div class="form-group col-lg-6">
                                            <label>Full name *</label>
                                            <input type="text" name="fullName" class="form-control" required>
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label>Identity Card *</label>
                                            <input type="text" name="identityCard" class="form-control" required>
                                            <p class="help-block">* You can check patient information in the system
                                                before creating new.</p>
                                            <a href=""><input type="button" class="btn btn-default" value="Check"></a>
                                        </div>
                                        <div class="form-group col-lg-4">
                                            <label>Province / City *</label>
                                            <select id="province" name="province" class="form-control" required>
                                                <option></option>
                                                @foreach($provinces as $p)
                                                    <option value="{{$p->id}}">{{$p->_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-lg-4">
                                            <label>District *</label>
                                            <select id="district" name="district" class="form-control" required>
                                            </select>
                                        </div>
                                        <div class="form-group col-lg-4">
                                            <label>Commune / Ward *</label>
                                            <select id="ward" name="ward" class="form-control" required>
                                            </select>
                                        </div>
                                        <div class="form-group col-lg-12">
                                            <label>Sex * :</label>
                                            <label class="radio-inline">
                                                <input type="radio" name="sex" id="optionsRadiosInline1"
                                                       value="male" checked>Male
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="sex" id="optionsRadiosInline2"
                                                       value="female">Female
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="sex" id="optionsRadiosInline3"
                                                       value="other">Other
                                            </label>
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label>Phone number *</label>
                                            <input name="phoneNumber" class="form-control" required>
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label>Ethnic Group *</label>
                                            <select name="ethnicGroup" class="form-control" required>
                                                @foreach($ethnics as $e)
                                                    <option value="{{$e->_id}}">{{$e->_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-lg-12">
                                            <label>Job *</label>
                                            <input name="job" class="form-control" required>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-4"></div>
                                            <div class="col-lg-4">
                                                <button type="submit" class="btn btn-default">Submit Button</button>
                                            </div>
                                            <div class="col-lg-4"></div>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-lg-2"></div>
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
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
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).ready(function () {
            $("#province").change(function () {
                $.ajax({
                    method: "GET",
                    url: "dashboard/ajax-district/" + $(this).val(),
                }).done(function (data) {
                    $('#district').html(data);
                    $('#ward').html("");
                });
            });
            $("#district").change(function () {
                $.ajax({
                    method: "GET",
                    url: "dashboard/ajax-ward/" + $('#province').val() + "/" + $(this).val(),
                }).done(function (data) {
                    $('#ward').html(data);
                });
            });
        });
    </script>
@endsection
