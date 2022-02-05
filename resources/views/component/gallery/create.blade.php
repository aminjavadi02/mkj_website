

<div class="row">
  <div class="col-md-11">
    <div class="card">
      <div class="card-header card-header-primary">
        <h4 class="card-title">عکس جدید برای گالری</h4>
        <p class="card-category">عکس را انتخاب نمایید</p>
      </div>
      <div class="card-body">
        <form method="post" action="{{url('/galleries')}}" enctype="multipart/form-data">
            <!-- go to store gallery -->
          @csrf
            <div class="row">
                <div class="col-md-5">
                <label class="bmd-label-floating">انتخاب تصویر</label>
                <input type="file" id="imageInp" name="image" class="form-control" accept="image/*">
                <img src="#" id="selectedImg" width="200px" alt="selectedImage">
                </div>
                <br>
            </div>
            <div class="row"><hr></div>
            <div class="row">
                <div class="col-md-9">
                <div class="form-group">
                    <label class="bmd-label-floating">توضیحات فارسی</label>
                    <input type="text" name="description_fa" class="form-control">
                </div>
                </div>
                <br><br>
            </div>
            <div class="row">
                <div class="col-md-9">
                <div class="form-group">
                    <label class="bmd-label-floating">توضیحات انگلیسی</label>
                    <input type="text" name="description_en" class="form-control">
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
