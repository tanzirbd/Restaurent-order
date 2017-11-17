@extends('admin.master')

@section('body_content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Dashboard
                <small>Version 2.0</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Dashboard</li>
            </ol>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Brand Preview</h3>
                        </div>

                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <tr>
                                        <th>SL</th>
                                        <th>Name</th>
                                        <th>Date</th>
                                        <th>Time</th>
                                        <th>Email</th>
                                        <th>Guests</th>
                                        <th>Phone</th>
                                    </tr>
                                    @php($i=1)
                                    @foreach($reservations as $reservation)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $reservation->name }}</td>
                                            <td>{{ $reservation->date }}</td>
                                            <td>{{ $reservation->time }}</td>
                                            <td>{{ $reservation->email }}</td>
                                            <td>{{ $reservation->guests }}</td>
                                            <td>{{ $reservation->phone }}</td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


    <div class="control-sidebar-bg"></div>

    </div>
    <!-- ./wrapper -->
@endsection
