@extends('layouts.app')
@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-11">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title">بلاگ جدید</h4>
            <p class="card-category">بلاگ جدید بسازید!</p>
          </div>
          <div class="card-body">
            @include('messages.errors')
            <form method="post" action="{{route('blogs.store')}}" enctype="multipart/form-data">
              @csrf
              <div class="row">
                <div class="col-md-5">
                  <div class="form-group">
                    <label class="bmd-label-floating">عنوان</label>
                    <input type="text" name="title" class="form-control">
                  </div>
                </div>
                <br><br>
                <div class="col-md-5">
                  <div class="form-group">
                    <label class="bmd-label-floating">اسلاگ</label>
                    <input type="text" name="slug" class="form-control">
                    <!-- add js to generate this from title -->
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>متن</label>
                    <div class="form-group">
                      <label class="bmd-label-floating">متن مقاله</label>
                      <textarea name="text" id="mytextarea" cols="30" rows="10"></textarea>
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

<!-- jquery -->
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
      selector: '#mytextarea',
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