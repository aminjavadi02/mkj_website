
<div class="row">
<div class="col-md-11">
    <div class="card">
    <div class="card-header card-header-primary">
        <h4 class="card-title">عکس جدید برای محصول</h4>
        <p class="card-category">عکس را انتخاب نمایید</p>
    </div>
    <div class="card-body">
        <form method="post" action="{{route('itemimages.store')}}" enctype="multipart/form-data">
            <!-- go to store gallery -->
        @csrf
            <div class="row">
                <div class="col-md-5">
                <label class="bmd-label-floating">انتخاب تصویر</label>
                <input type="file" id="imageInp" name="image" class="form-control" accept="image/*">
                <img src="#" id="selectedImg" width="200px">
                </div>
                <br>
            </div>
            <input type="text" name="item_id" value="{{$item_id}}" hidden>
        <button type="submit" class="btn btn-primary pull-right">ثبت تغییرات</button>
        </form>
    </div>
    </div>
</div>
</div>

<script src="{{asset('assets/js/core/jquery.min.js')}}"></script>
<script src="{{asset('assets/js/readurl.js')}}" ></script>
<script>

window.onload = function(){
    $('#selectedImg').hide();
    $('#imageInp').change(function(){
    readURL(this);
    });
}
</script>
