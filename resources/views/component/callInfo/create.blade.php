@extends('layouts.app')
@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-11">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title">اضافه کردن شماره تلفن</h4>
          </div>
          <div class="card-body">
            <form method="post" action="{{url('/callinfo')}}" enctype="multipart/form-data">
              @csrf
              <div class="row">
                <div class="col-md-5">
                  <div class="form-group">
                    <label class="bmd-label-floating">نام فارسی</label>
                    <input type="text" name="name_fa" class="form-control">
                  </div>
                </div>
                <br><br>
                <div class="col-md-5">
                  <div class="form-group">
                    <label class="bmd-label-floating">نام انگلیسی</label>
                    <input type="text" name="name_en" class="form-control">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-5">
                  <div class="form-group">
                    <div class="form-group">
                        <label class="bmd-label-floating">سمت شغلی فارسی</label>
                        <input type="text" name="position_fa" class="form-control">
                    </div>
                  </div>
                </div>
                <div class="col-md-5">
                  <div class="form-group">
                    <div class="form-group">
                        <label class="bmd-label-floating">سمت شغلی انگلیسی</label>
                        <input type="text" name="position_en" class="form-control">
                    </div>
                  </div>
                </div>
                <div class="col-md-5">
                  <div class="form-group">
                    <div class="form-group">
                        <label class="bmd-label-floating">شماره تلفن</label>
                        <input type="text" name="phone_number" class="form-control">
                    </div>
                  </div>
                </div>
              </div>
              <button type="submit" class="btn btn-primary pull-right">ثبت تغییرات</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection