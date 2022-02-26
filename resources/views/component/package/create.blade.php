@extends('layouts.app')
@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-11">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title">نوع بسته بندی جدید</h4>
            <p class="card-category">نوع بسته بندی را اضافه کنید</p>
          </div>
          <div class="card-body">
          @include('messages.errors')
            <form method="post" action="{{route('packages.store')}}">
              @csrf
              <div class="row">
                <div class="col-md-5">
                  <div class="form-group">
                    <label class="bmd-label-floating">*نام فارسی</label>
                    <input type="text" name="name_fa" class="form-control">
                  </div>
                </div>
                <br><br>
                <div class="col-md-5">
                  <div class="form-group">
                    <label class="bmd-label-floating">*نام انگلیسی</label>
                    <input type="text" name="name_en" class="form-control">
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