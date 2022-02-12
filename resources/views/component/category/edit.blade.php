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
            <form method="post" action="/categories/{{$category->id}}">
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
  function submitform(){
    // if parent_id == null confirm it
    
  }
</script>

@endsection