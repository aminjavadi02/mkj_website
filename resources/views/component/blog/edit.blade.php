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
            <form method="post" action="/blogs/{{$blog->id}}" enctype="multipart/form-data">
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
                      <textarea class="form-control" name="text" rows="10">{{$blog->text}}</textarea>
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
                  <img src="{{asset('storage/images/'.$blog->image_name)}}" id="img" alt="image" width="200px">
                  <br>
                  <div class="btn btn-danger pull-left" onclick="deleteImage()">حذف تصویر</div>
                </div>
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


<script src="{{asset('assets/js/core/jquery.min.js')}}"></script>
<script>
  function deleteImage(){
    // console.log();
    // show are you sure msg
    if(confirm('آیا از حذف این تصویر اطمینان دارید؟')){
      document.getElementById("imageInp").value = null;
      document.getElementById("img").remove();
      document.getElementById("currentImageDiv").remove();
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

@endsection