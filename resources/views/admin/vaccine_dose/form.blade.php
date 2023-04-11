<div class="row">


    <div class="col-12">
        <div class="mb-1 row">
            <div class="col-sm-3">
                <label class="col-form-label" for="first-name">Dose name</label>
            </div>
            <div class="col-sm-9">
                <input type="text" id="first-name" class="form-control" name="dose_name" placeholder="Enter Dose name" data-validation="required" value="{{$vcompany->dose_name??null}}">
            </div>
        </div>
    </div>

    <div class="col-sm-9 offset-sm-3">
        <button type="submit" class="btn btn-primary me-1 waves-effect waves-float waves-light">@if(isset($vcompany)) Update @else Submit @endif</button>
        <a href="{{route('vdose')}}" class="btn btn-outline-secondary waves-effect">Cancel</a>
    </div>
</div>

