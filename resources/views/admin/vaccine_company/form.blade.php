<div class="row">
    <div class="col-12">
        <div class="mb-1 row">
            <div class="col-sm-3">
                <label class="col-form-label" for="first-name">Company name</label>
            </div>
            <div class="col-sm-9">
                <input type="text" id="first-name" class="form-control" name="company_name" placeholder="Enter Company name" data-validation="required" value="{{$vcompany->name??null}}">
            </div>
        </div>
    </div>

    <div class="col-sm-9 offset-sm-3">
        <button type="submit" class="btn btn-primary me-1 waves-effect waves-float waves-light">@if(isset($vcompany)) Update @else Submit @endif</button>
        <a href="{{route('vcompany')}}" class="btn btn-outline-secondary waves-effect">Cancel</a>
    </div>
</div>

