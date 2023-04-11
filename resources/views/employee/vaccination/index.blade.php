@extends('layouts.admin')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Vaccine Dose</h1>
                </div><!-- /.col -->
                <div class="col-sm-6 float-sm-right">

                    <ol class="breadcrumb float-sm-right">
                        <a href="{{route('vdose.create')}}">Add Vaccine Dose</a>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
            <div class="card-datatable p-1">
                @include('admin.flash_messages')

                <table id="example2" class="table table-bordered table-striped dataTable dtr-inline" aria-describedby="example1_info">
                    <thead>
                    <tr>
                        <th>Dose Name</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>

                    </tbody>

                </table>
            </div>
        </div><!-- /.container-fluid -->
    </div>

@endsection

