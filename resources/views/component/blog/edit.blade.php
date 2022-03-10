@extends('layouts.app')
@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-11">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title">{{$blog->title}}</h4>
            <p class="card-category">ویرایش بلاگ</p>
          </div>
          <div class="card-body">
            <form method="post" action="/admin/blogs/{{$blog->id}}" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <div class="row">
                <div class="col-md-5">
                  <div class="form-group">
                    <label class="bmd-label-floating">عنوان</label>
                    <input type="text" name="title" class="form-control" value="{{$blog->title}}">
                  </div>
                </div>
                <br><br>

                <div class="col-md-5">
                  <div class="form-group">
                    <label class="bmd-label-floating">اسلاگ</label>
                    <input type="text" name="slug" class="form-control" value="{{$blog->slug}}">
                    <!-- add js to generate this from title -->
                  </div>
                </div>


                <!--  -->
              </div>
              <!--  -->
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>متن</label>
                    <div class="form-group">
                      <label class="bmd-label-floating">متن مقاله</label>
                      <textarea id="mytextarea" class="form-control" name="text" rows="10">{{$blog->text}}</textarea>
                    </div>
                    
                  </div>
                </div>
              </div>
              <!--  -->
              <div class="row">
                <div class="col-md-5">
                  <label class="bmd-label-floating">انتخاب تصویر جدید</label>
                  <br>
                  <img src="#" id="selectedImg" alt="selectedImg" width="200px">
                  <br> <br>
                  <input type="file" name="image" class="form-control" id="imageInp" accept="image/*" >
                </div>

                @if($blog->image_name)
                <div class="col-md-5" id="currentImageDiv" style="border-left: 1px solid gray; height: 400px;">
                  <label class="bmd-label-floating">تصویر فعلی</label>
                  <br>
                  <img src="{{asset('storage/images/blog/'.$blog->image_name)}}" id="img" alt="image" width="200px">
                  <br>
                  <div class="btn btn-danger pull-left" onclick="deleteImage()">حذف تصویر</div>
                </div>
                <input type="text" hidden id="deleteOrNot" name="imageIsDeleted" value="false">
                @endif
              </div>
              <!--  -->
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
<!-- jquery -->
<script src="{{asset('assets/js/core/jquery.min.js')}}"></script>
<!-- readurl function -->
<script src="{{asset('assets/js/readurl.js')}}" ></script>
<script src="{{asset('assets/js/deleteImage.js')}}" ></script>
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