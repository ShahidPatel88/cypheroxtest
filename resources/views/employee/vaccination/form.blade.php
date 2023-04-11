<div class="row">


    <div class="col-12">
        <div class="mb-1 row">
            <div class="col-sm-3">
                <label class="col-form-label" for="first-name">Company name</label>
            </div>
            <div class="col-sm-9">
                <select id="dose_id" class="form-control" name="company_id" required>
                    <option value="">Select Company</option>
                    @foreach(\App\Models\VCompany::get() as $value)
                        <option value="{{$value->id}}">{{$value->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>

    <div class="col-12">
        <div class="mb-1 row">
            <div class="col-sm-3">
                <label class="col-form-label" for="first-name">Dose name</label>
            </div>
            <div class="col-sm-9">
                <select id="dose_id" class="form-control" name="dose_id" required>
                    <option value="">Select Dose</option>
                    @foreach(\App\Models\VCompanyDose::get() as $value)
                        <option value="{{$value->id}}">{{$value->dose_name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>

    <div class="col-12">
        <div class="mb-1 row">
            <div class="col-sm-3">
                <label class="col-form-label" for="first-name">Dose Date</label>
            </div>
            <div class="col-sm-9">
                <div class="form-group">

                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
                        <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate"  name="date_dose" required>
                        <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="col-sm-9 offset-sm-3">
        <button type="submit" class="btn btn-primary me-1 waves-effect waves-float waves-light">@if(isset($vcompany)) Update @else Submit @endif</button>
        <a href="{{route('vdose')}}" class="btn btn-outline-secondary waves-effect">Cancel</a>
    </div>
</div>

