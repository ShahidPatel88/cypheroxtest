@extends('layouts.employee')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            @include('employee.flash_messages')
            <form class="form form-horizontal" method="POST" action="{{ route('submitvaccine') }}" accept-charset="UTF-8" enctype="multipart/form-data">
                @csrf
                @include('employee.vaccination.form')
            </form>
        </div><!-- /.container-fluid -->
    </div>
@endsection

