@extends('layouts.app')
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
                    <input type="text" name="office_phone" class="form-control" value="{{$aboutus->office_phone}}">
                  </div>
                </div>
                <br><br>

                <div class="col-md-5">
                  <div class="form-group">
                    <label class="bmd-label-floating">تلفن کارخانه</label>
                    <input type="text" name="factory_phone" class="form-control" value="{{$aboutus->factory_phone}}">
                  </div>
                </div>


                <!--  -->
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">آدرس دفتر</label>
                    <input type="text" name="office_address_fa" class="form-control" value="{{$aboutus->office_address_fa}}">
                  </div>
                </div>
                <br><br>

                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">آدرس دفتر به انگلیسی</label>
                    <input type="text" name="office_address_en" class="form-control" value="{{$aboutus->office_address_en}}">
                  </div>
                </div>
                <br><br>

                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">آدرس کارخانه</label>
                    <input type="text" name="factory_address_fa" class="form-control" value="{{$aboutus->factory_address_fa}}" >
                  </div>
                </div>
                <br><br>

                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">آدرس کارخانه به انگلیسی</label>
                    <input type="text" name="factory_address_en" class="form-control" value="{{$aboutus->factory_address_en}}">
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
                      <textarea class="form-control" name="history_fa" rows="10">{{$aboutus->history_fa}}</textarea>
                    </div>
                    <div class="form-group">
                      <label class="bmd-label-floating">تاریخچه ی کارخانه به انگلیسی</label>
                      <textarea class="form-control" name="history_en" rows="10">{{$aboutus->history_en}}</textarea>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-5">
                  <label class="bmd-label-floating">انتخاب تصویر جدید</label>
                  <br>
                  <img src="#" id="selectedImg" alt="selectedImg" width="200px">
                  <br> <br>
                  <input type="file" name="image" class="form-control" id="imageInp" accept="image/*" >
                </div>
                @if($aboutus->image_name)
                <div class="col-md-5" id="currentImageDiv" style="border-left: 1px solid gray; height: 400px;">
                  <label class="bmd-label-floating">تصویر فعلی</label>
                  <br>
                  <img src="{{asset('storage/images/'.$aboutus->image_name)}}" id="img" alt="image" width="200px">
                  <br>
                  <div class="btn btn-danger pull-left" onclick="deleteImage()">حذف تصویر</div>
                </div>
                @endif
              </div>
              <button type="submit" class="btn btn-primary pull-right">ثبت تغییرات</button>
            </form>
          </div>
        </div>
      </div>
      
    </div>
  </div>
</div>



<!-- script -->
<script src="{{asset('assets/js/core/jquery.min.js')}}"></script>
<script>
  function deleteImage(){
    // console.log();
    // show are you sure msg
    if(confirm('آیا از حذف این تصویر اطمینان دارید؟')){
      $("#currentImageDiv").remove()
      $("#selectImg").value = null;
      
    }
  }
  
  function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#selectedImg').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
  }

  $('#imageInp').change(function(){
      readURL(this);
  });
</script>

<!-- delete picture => image = null -->
<!-- edit picture => image = new amount -->

@endsection