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
            <form method="post" action="{{route('items.store')}}" enctype="multipart/form-data">
              @csrf
              <div class="row">
                <div class="col-md-5">
                  <div class="form-group">
                    <label class="bmd-label-floating">*نام فارسی</label>
                    <input type="text" name="name_fa" class="form-control"value="{{old('name_fa')}}" required>
                  </div>
                </div>
                <br><br>
                <div class="col-md-5">
                  <div class="form-group">
                    <label class="bmd-label-floating">نام انگلیسی</label>
                    <input type="text" name="name_en" class="form-control" value="{{old('name_en')}}">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>*توضیحات فارسی</label>
                    <div class="form-group">
                      <textarea name="description_fa" class="form-control mytextarea" id="section01" cols="30" rows="10" required>{{old('description_fa')}}</textarea>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>توضیحات انگلیسی</label>
                    <div class="form-group">
                      <textarea name="description_en" class="form-control mytextarea" id="section02" cols="30" rows="10">{{old('description_en')}}</textarea>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <div class="form-group">
                    <label class="bmd-label-floating">آلیاژ فارسی</label>
                    <input type="text" name="alloy_fa" class="form-control" value="{{old('alloy_fa')}}">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="form-group">
                    <label class="bmd-label-floating">آلیاژ انگلیسی</label>
                    <input type="text" name="alloy_en" class="form-control" value="{{old('alloy_en')}}">
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <div class="form-group">
                    <label class="bmd-label-floating">سایز</label>
                    <input type="text" name="size" class="form-control" value="{{old('size')}}">
                    </div>
                  </div>
                </div>
              </div>
              <!-- select packaging -->
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>بسته بندی</label>
                    <br>
                    @if($packages)
                    @foreach($packages as $package)
                    <div class="form-check">
                      <!-- naming this way cause it should be different from tree ids -->
                      <!-- add all inputs to a list in js then send it -->
                      <input type="checkbox" value="{{$package->id}}" id="{{$package->id}}checkbox" name="packages[{{$package->id}}]">
                      <label for="{{$package->id}}checkbox">
                        {{$package->name_fa}}
                      </label>
                    </div>
                    @endforeach
                    @else
                    <br>
                    <label class="bmd-label-floating">نوع بسته بندی وجود ندارد</label><br>
                    <a href="{{route('packages.create')}}" class="btn btn-success">ساخت بسته بندی جدید</a>
                    <br> <br>
                    @endif
                  </div>
                </div>
              </div>
              <!-- select category -->
              @if(Route::current()->category_id)
                @if($category)
                <!-- taki and not null -->
                <label>*دسته بندی</label>
                <div class="btn btn-primary">{{$category->name_fa}}</div>
                <input type="text" value="{{$category->id}}" name="category_id" hidden>
                @else
                <br>
                <label class="bmd-label-floating">نوع دسته بندی وجود ندارد</label><br>
                <a href="{{url('/admin/categories/root/create')}}" class="btn btn-success">ساخت دسته بندی جدید</a>
                <br> <br>
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
                @else
                <br>
                <label class="bmd-label-floating">نوع دسته بندی وجود ندارد</label><br>
                <a href="{{url('/admin/categories/root/create')}}" class="btn btn-success">ساخت دسته بندی جدید</a>
                <br><br>
                @endif
              @endif
              <button id="submitBtn" type="submit" class="btn btn-primary pull-right">ثبت تغییرات</button>
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
//   put "if the category is tree", then:
  var treeObject = @json($category);
  var packages = @json($packages);
  // @ json(laravelValue) -> turns laravel object to json object
  const ul = $('#tree');

  if(treeObject.length <= 0){
    $('#submitBtn').remove();
  }
  else if(treeObject.length > 0 && packages.length <= 0){
    $('#submitBtn').remove();
    drawTree(treeObject,ul[0],"category_id");
  }
  else if(treeObject.length > 0 && packages.length > 0){
    drawTree(treeObject,ul[0],"category_id");
  }


  var vals = [];
  window.onload = function () {
    // for input boxes that use tinymce
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