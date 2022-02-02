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
            <form method="post" action="{{url('/blogs')}}" enctype="multipart/form-data">
              @csrf
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
              <div class="row">
                <div class="col-md-5">
                  <label class="bmd-label-floating">انتخاب تصویر</label>
                  <input type="file" name="image" class="form-control" value="{{$blog->image_name}}">
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

@endsection