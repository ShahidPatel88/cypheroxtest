@if (Session::get('success'))
    <div class="alert alert-success alert-dismissible" role="alert">
        <div class="alert-body">
            {{ Session::get('success') }}
        </div>

    </div>
@endif
@if (Session::get('error'))
    <div class="alert alert-danger alert-dismissible" role="alert">
        <div class="alert-body">
            {{ Session::get('error') }}
        </div>

    </div>
@endif
@if (Session::get('failed'))
    <div class="alert alert-danger alert-dismissible" role="alert">
        <div class="alert-body">
            {{ Session::get('failed') }}
        </div>

    </div>
@endif
@if ($errors->any())
    <div class="alert alert-danger alert-dismissible" role="alert">
        <div class="alert-body">
            <i class="feather icon-info mr-1 align-middle"></i>
            {!! implode('', $errors->all('<span>:message</span>')) !!}
        </div>
        
    </div>
@endif
