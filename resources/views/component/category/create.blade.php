@extends('layouts.app')
@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-11">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title">دسته بندی جدید</h4>
            <p class="card-category">دسته بندی جدید بسازید!</p>
          </div>
          <div class="card-body">
            <form method="post" action="{{route('categories.store')}}" enctype="multipart/form-data">
            <!-- change to categories -->
              @csrf
              <div class="row">
                <div class="col-md-5">
                  <div class="form-group">
                    <label class="bmd-label-floating">نام دسته بندی به فارسی</label>
                    <input type="text" name="name_fa" class="form-control" value="{{old('name_fa')}}">
                  </div>
                </div>
                <br><br>

                <div class="col-md-5">
                  <div class="form-group">
                    <label class="bmd-label-floating">نام دسته بندی به انگلیسی</label>
                    <input type="text" name="name_en" class="form-control" value="{{old('name_en')}}">
                  </div>
                </div>
              </div>
              <!--  -->
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>دسته بندی پدر</label>
                    <div class="form-group tree">
                      @if($parent_id != "root")
                      <input type="text" name="parent_id" class="form-control" value="{{$parent_id->id}}" hidden>
                      <span class="btn btn-primary" id="editParentButton">
                        {{$parent_id->name_fa}}
                      </span>
                      @elseif($parent_id=="root")
                      <input type="text" name="parent_id" class="form-control" value="" hidden>
                      <span class="btn btn-primary" id="editParentButton">
                        root
                      </span>
                      @endif
                    </div>
                  </div>
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