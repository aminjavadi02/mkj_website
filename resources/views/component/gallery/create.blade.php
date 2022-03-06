

<div class="row">
  <div class="col-md-11">
    <div class="card">
      <div class="card-header card-header-primary">
        <h4 class="card-title">عکس جدید برای گالری</h4>
        <p class="card-category">عکس را انتخاب نمایید</p>
      </div>
      <div class="card-body">
        <form method="post" action="{{route('galleries.store')}}" enctype="multipart/form-data">
          @csrf
            <div class="row">
                <div class="col-md-5">
                <label class="bmd-label-floating">انتخاب تصویر</label>
                <input type="file" id="imageInp" name="image" class="form-control" accept="image/*">
                <img src="#" id="selectedImg" width="200px">
                </div>
                <br>
            </div>
          <button type="submit" class="btn btn-primary pull-right">ثبت عکس</button>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-11">
    <div class="card">
      <div class="card-header card-header-primary">
        <h4 class="card-title">ویدیو جدید برای گالری</h4>
        <p class="card-category">ویدیو را انتخاب نمایید</p>
      </div>
      <div class="card-body">
      <form method="post" action="{{route('videos.store')}}" enctype="multipart/form-data">
        @csrf
          <div class="row">
              <div class="col-md-5">
              <label class="bmd-label-floating">انتخاب ویدیو</label>
              <input type="file" id="videoInp" name="video" class="form-control" accept="video/*">
              </div>
              <br>
          </div>
        <button type="submit" class="btn btn-primary pull-right">ثبت ویدیو</button>
      </form>
      </div>
    </div>
  </div>
</div>




<script src="{{asset('assets/js/core/jquery.min.js')}}"></script>
<!-- readurl function -->
<script src="{{asset('assets/js/readurl.js')}}" ></script>
<script>
  window.onload = function(){
    $('#selectedImg').hide();
    $('#imageInp').change(function(){
    readURL(this);
    });
  }
</script>
