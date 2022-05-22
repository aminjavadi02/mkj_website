@extends('layouts.app')
@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-11">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title">اضافه کردن اعضای هیات مدیره</h4>
          </div>
          <div class="card-body">
            <form method="post" action="{{route('managers.store')}}" enctype="multipart/form-data">
              @csrf
              <div class="row">
                <div class="col-md-5">
                  <div class="form-group">
                    <label class="bmd-label-floating">*نام فارسی</label>
                    <input type="text" name="name_fa" class="form-control" value="{{old('name_fa')}}" required>
                  </div>
                </div>
                <br><br>
                <div class="col-md-5">
                  <div class="form-group">
                    <label class="bmd-label-floating">*نام انگلیسی</label>
                    <input type="text" name="name_en" class="form-control" value="{{old('name_en')}}" required>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-5">
                  <div class="form-group">
                    <div class="form-group">
                        <label class="bmd-label-floating">*سمت شغلی فارسی</label>
                        <input type="text" name="position_fa" class="form-control" value="{{old('position_fa')}}" required>
                    </div>
                  </div>
                </div>
                <div class="col-md-5">
                  <div class="form-group">
                    <div class="form-group">
                        <label class="bmd-label-floating">*سمت شغلی انگلیسی</label>
                        <input type="text" name="position_en" class="form-control" value="{{old('position_en')}}" required>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>*درباره (فارسی)</label>
                    <div class="form-group">
                      <textarea name="about_fa" id="section01" class="mytextarea" cols="30" rows="10" required>{{old('about_fa')}}</textarea>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>*درباره (انگلیسی)</label>
                    <div class="form-group">
                      <textarea name="about_en" id="section02" class="mytextarea" cols="30" rows="10" required>{{old('about_en')}}</textarea>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-5">
                  <label class="bmd-label-floating">انتخاب تصویر</label>
                  <input type="file" id="imageInp" name="image" class="form-control" accept="image/*">
                  <img src="#" id="selectedImg" width="200px" alt="selectedImage">
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

<!-- tiny mce -->
<script src="https://cdn.tiny.cloud/1/dgrgw7wn2i5rc3vvdsqmydzizsk8su4hcmx7vl9dxcwwt89f/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>


<script src="{{asset('assets/js/core/jquery.min.js')}}"></script>
<!-- readurl function -->
<script src="{{asset('assets/js/readurl.js')}}" ></script>
<script>
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