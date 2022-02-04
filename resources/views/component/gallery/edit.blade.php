@extends('layouts.app')
@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-11">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title">ویرایش تصویر</h4>
            <p class="card-category">ویرایش بلاگ</p>
          </div>
          <div class="card-body">
            <form method="post" action="/galleries/{{$image->id}}" enctype="multipart/form-data">
                <!-- edit form to update gallery -->
                @csrf
                @method('put')
                    <div class="row">
                        <div class="col-md-5">
                        <label class="bmd-label-floating">انتخاب تصویر جدید</label>
                        <input type="file" id="imageInp" name="image" class="form-control" accept="image/*">
                        <img src="#" id="selectedImg" width="200px" alt="selectedImage">
                        </div>
                        <br>
                        <!-- current -->
                        @if($image->name)
                        <div class="col-md-5" id="currentImageDiv" style="border-left: 1px solid gray; height: 400px;">
                            <label class="bmd-label-floating">تصویر فعلی</label>
                            <br>
                            <img src="{{asset('storage/images/'.$image->name)}}" id="img" alt="image" width="200px">
                            <br>
                            <div class="btn btn-danger pull-left" onclick="deleteImage()">حذف تصویر</div>
                        </div>
                        @endif
                        <!-- end current -->
                    </div>
                    <div class="row"><hr></div>
                    <div class="row">
                        <div class="col-md-9">
                        <div class="form-group">
                            <label class="bmd-label-floating">توضیحات</label>
                            <input type="text" name="description" class="form-control">
                        </div>
                        </div>
                        <br><br>
                    </div>
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