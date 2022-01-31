@extends('layouts.app')
<!-- change this to about us form inputs -->
@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-11">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title">درباره ی ما</h4>
            <p class="card-category">ویرایش صفحه درباره ی ما</p>
          </div>
          <div class="card-body">
            <form method="post" action="{{url('aboutus/1')}}" enctype="multipart/form-data">
              @method('PUT')
              @csrf
              <div class="row">
                <div class="col-md-5">
                  <div class="form-group">
                    <label class="bmd-label-floating">تلفن دفتر</label>
                    <input type="text" name="office_phone" class="form-control">
                  </div>
                </div>
                <br><br>

                <div class="col-md-5">
                  <div class="form-group">
                    <label class="bmd-label-floating">تلفن کارخانه</label>
                    <input type="text" name="factory_phone" class="form-control">
                  </div>
                </div>


                <!--  -->
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">آدرس دفتر</label>
                    <input type="text" name="office_address_fa" class="form-control">
                  </div>
                </div>
                <br><br>

                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">آدرس دفتر به انگلیسی</label>
                    <input type="text" name="office_address_en" class="form-control">
                  </div>
                </div>
                <br><br>

                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">آدرس کارخانه</label>
                    <input type="text" name="factory_address_fa" class="form-control">
                  </div>
                </div>
                <br><br>

                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">آدرس کارخانه به انگلیسی</label>
                    <input type="text" name="factory_address_en" class="form-control">
                  </div>
                </div>
                <br><br>
              </div>
              <!--  -->
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>تاریخچه</label>
                    <div class="form-group">
                      <label class="bmd-label-floating">تاریخچه ی کارخانه به فارسی</label>
                      <textarea class="form-control" name="history_fa" rows="10"></textarea>
                    </div>
                    <div class="form-group">
                      <label class="bmd-label-floating">تاریخچه ی کارخانه به انگلیسی</label>
                      <textarea class="form-control" name="history_en" rows="10"></textarea>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-5">
                  <label class="bmd-label-floating">انتخاب تصویر</label>
                  <input type="file" name="image" class="form-control">
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