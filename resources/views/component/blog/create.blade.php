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
            <form method="post" action="{{url('/blogs')}}" enctype="multipart/form-data">
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


                <!--  -->
              </div>
              <!--  -->
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>متن</label>
                    <div class="form-group">
                      <label class="bmd-label-floating">متن مقاله</label>
                      <textarea class="form-control" name="text" rows="10"></textarea>
                    </div>
                    
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-5">
                  <label class="bmd-label-floating">انتخاب تصویر</label>
                  <input type="file" id="imageInp" name="image" class="form-control">
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

<script src="{{asset('assets/js/core/jquery.min.js')}}"></script>
<script>
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