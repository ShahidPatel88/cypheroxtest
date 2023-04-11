@extends('layouts.admin')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Employee List</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <select id="dose_id" class="form-select text-capitalize mb-md-0 mb-2">

                            <option value="">Select Dose</option>
                            @foreach(\App\Models\VCompanyDose::get() as $value)
                                <option value="{{$value->id}}">{{$value->dose_name}}</option>
                            @endforeach
                        </select>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
            <div class="card-datatable p-1">
                @include('admin.flash_messages')

                <table id="example3" class="table table-bordered table-striped dataTable dtr-inline" aria-describedby="example1_info">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Company Name</th>
                        <th>Dose Name</th>
                        <th>Dose Date</th>

                    </tr>
                    </thead>
                    <tbody>

                    </tbody>

                </table>
            </div>
        </div><!-- /.container-fluid -->
    </div>

@endsection

