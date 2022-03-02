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
            <form method="post" action="{{url('admin/aboutus/1')}}" enctype="multipart/form-data">
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
                    <label>تاریخچه به فارسی</label>
                    <div class="form-group">
                      <textarea id="section01" class="form-control mytextarea" name="history_fa" rows="10">{{$aboutus->history_fa}}</textarea>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>تاریخچه به انگلیسی</label>
                    <div class="form-group">
                      <textarea id="section02" class="form-control mytextarea" name="history_en" rows="10">{{$aboutus->history_en}}</textarea>
                    </div>
                  </div>
                </div>
              </div>
              <!-- <div class="form-group">
                      <label class="bmd-label-floating">تاریخچه ی کارخانه به انگلیسی</label>
                      <textarea id="section02" class="form-control mytextarea" name="history_en" rows="10">{{$aboutus->history_en}}</textarea>
                    </div> -->
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
                  <img src="{{asset('storage/images/aboutus/'.$aboutus->image_name)}}" id="img" alt="image" width="200px">
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


<!-- tinymce -->
<script src="https://cdn.tiny.cloud/1/dgrgw7wn2i5rc3vvdsqmydzizsk8su4hcmx7vl9dxcwwt89f/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<!-- readurl function -->
<script src="{{asset('assets/js/readurl.js')}}" ></script>
<!-- jquery -->
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
  
  


  window.onload = function () {
    $('#selectedImg').hide();
    $('#imageInp').change(function(){
    readURL(this);
    });
    tinymce.init({
      selector: '.mytextarea',
      skin: (window.matchMedia('(prefers-color-scheme: dark)').matches ? 'oxide-dark' : 'oxide'),
      content_css: (window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'default'),
      menubar: 'edit format',
      toolbar: 'undo redo | styleselect | fontselect | bold italic underline | alignleft aligncenter alignright alignjustify | outdent indent',
      // add font
      font_formats: "Andale Mono=andale mono,times; Arial=arial,helvetica,sans-serif; Arial Black=arial black,avant garde; Book Antiqua=book antiqua,palatino; Comic Sans MS=comic sans ms,sans-serif; Courier New=courier new,courier; Georgia=georgia,palatino; Helvetica=helvetica; Impact=impact,chicago; Symbol=symbol; Tahoma=tahoma,arial,helvetica,sans-serif; Terminal=terminal,monaco; Times New Roman=times new roman,times; Trebuchet MS=trebuchet ms,geneva; Verdana=verdana,geneva; Webdings=webdings; Wingdings=wingdings,zapf dingbats",
      content_style: "@import url('https://fonts.googleapis.com/css2?family=Oswald&display=swap');",
    });
  }
</script>

@endsection