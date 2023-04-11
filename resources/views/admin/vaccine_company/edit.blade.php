@extends('layouts.admin')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            @include('admin.flash_messages')
                <form class="form form-horizontal" method="POST" action="{{ route('vcompany.update',$vcompany->id) }}" accept-charset="UTF-8" enctype="multipart/form-data">
                    @csrf
                    @include('admin.vaccine_company.form')
                </form>
        </div><!-- /.container-fluid -->
    </div>
@endsection

