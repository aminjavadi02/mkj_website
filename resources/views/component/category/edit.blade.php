@extends('layouts.app')
@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-11">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title">ویرایش دسته بندی</h4>
          </div>
          <div class="card-body">
          @include('messages.errors')
            <form method="post" action="/admin/categories/{{$category->id}}">
            <!-- change to categories -->
              @csrf
              @method('put')
              <div class="row">
                <div class="col-md-5">
                  <div class="form-group">
                    <label class="bmd-label-floating">نام دسته بندی به فارسی</label>
                    <input type="text" name="name_fa" class="form-control" value="{{$category->name_fa}}">
                  </div>
                </div>
                <br><br>

                <div class="col-md-5">
                  <div class="form-group">
                    <label class="bmd-label-floating">نام دسته بندی به انگلیسی</label>
                    <input type="text" name="name_en" class="form-control" value="{{$category->name_en}}" >
                  </div>
                </div>
              </div>
              <!--  -->
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>دسته بندی پدر</label>
                    <!-- خودش نباید پدر خودش باشه -->
                    <div class="form-group tree">
                        <!-- show all cats as ul li here -->
                        <ul id="tree" class="category_ul"></ul>
                        <input type="text" id="needed_input" value="{{$category->parent_id}}" name="parent_id" hidden>
                    </div>
                    @include('component.category.selectableTree')
                  </div>
                </div>
              </div>
              <button class="btn btn-primary pull-right" onclick="submitform()">ثبت تغییرات</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  var treeObject = @json($tree);
  // @ json(laravelValue) -> turns laravel object to json object
  const ul = $('#tree');
  // ul is an object. ul[0] is the tag itself.
  drawTree(treeObject,ul[0],"parent_id");

  var $cat = @json($category);
  function anti_self_father($cat){
    // $(`#${$cat['id']}`) => input
    // .parent => input and label container
    // .parent => li tag
    // this way, it can't be the child of it's child too.
    
    $(`#${$cat['id']}`).parent().parent().remove();
  }

  function submitform(){
    // if parent_id == null confirm it
    
  }


  window.onload = function() {
    console.log('hi');
    // to toggle the ul in categories
    // important: make this responsive
    var toggler = $(".caret");
    for ( var i = 0; i < toggler.length; i++) {
        toggler[i].onclick = function() {
        $(this).toggleClass("caret-down");
        this.parentElement.querySelector(".nested").classList.toggle("active");
        }
    }

    anti_self_father($cat);
  }

</script>

@endsection