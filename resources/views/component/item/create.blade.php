@extends('layouts.app')
@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-11">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title">محصول جدید</h4>
            <p class="card-category">محصول جدید اضافه کنید!</p>
          </div>
          <div class="card-body">
            <form method="post" action="{{url('/items')}}" enctype="multipart/form-data">
              @csrf
              <div class="row">
                <div class="col-md-5">
                  <div class="form-group">
                    <label class="bmd-label-floating">نام فارسی</label>
                    <input type="text" name="name_fa" class="form-control">
                  </div>
                </div>
                <br><br>
                <div class="col-md-5">
                  <div class="form-group">
                    <label class="bmd-label-floating">نام انگلیسی</label>
                    <input type="text" name="name_en" class="form-control">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>توضیحات فارسی</label>
                    <div class="form-group">
                      <textarea name="description_fa" class="form-control mytextarea" id="section01" cols="30" rows="10"></textarea>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>توضیحات انگلیسی</label>
                    <div class="form-group">
                      <textarea name="description_en" class="form-control mytextarea" id="section02" cols="30" rows="10"></textarea>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <div class="form-group">
                    <label class="bmd-label-floating">آلیاژ</label>
                    <input type="text" name="alloy" class="form-control">
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <div class="form-group">
                    <label class="bmd-label-floating">سایز</label>
                    <input type="text" name="size" class="form-control">
                    </div>
                  </div>
                </div>
              </div>
              <!-- select packaging -->
              @if($packages)
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>بسته بندی</label>
                    <br>
                    <select name="package_id" class="form-select" style="width: 30%">
                        @foreach($packages as $package)
                            <option value="{{$package->id}}">{{$package->name_fa}}</option>
                        @endforeach
                    </select>
                  </div>
                </div>
              </div>
              @endif
              <!-- select category -->
              @if(Route::current()->category_id)
                @if($category)
                <!-- taki and not null -->
                <label>دسته بندی</label>
                <div class="btn btn-primary">{{$category->name_fa}}</div>
                <input type="text" value="{{$category->id}}" name="category_id" hidden>
                @endif
              @else
                @if($category)
                <!-- tree -->
                <label>دسته بندی</label>
                <div class="form-group tree">
                    <!-- show all cats as ul li here -->
                    <ul id="tree" class="category_ul"></ul>
                    <input type="text" id="needed_input" name="category_id" hidden>
                </div>
                @include('component.category.selectableTree')
                @endif
              @endif
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

//   if the category is tree, then:

  var treeObject = @json($category);
  // @ json(laravelValue) -> turns laravel object to json object
  const ul = $('#tree');
  // ul is an object. ul[0] is the tag itself.

  drawTree(treeObject,ul[0],"category_id");

  window.onload = function () {
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

    // to toggle the ul in categories
    // important: make this responsive
    var toggler = $(".caret");
    for ( var i = 0; i < toggler.length; i++) {
        toggler[i].onclick = function() {
        $(this).toggleClass("caret-down");
        this.parentElement.querySelector(".nested").classList.toggle("active");
        }
    }

  }

  
</script>

@endsection