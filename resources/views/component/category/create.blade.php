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
            <form method="post" action="{{url('/categories')}}" enctype="multipart/form-data">
            <!-- change to categories -->
              @csrf
              <div class="row">
                <div class="col-md-5">
                  <div class="form-group">
                    <label class="bmd-label-floating">نام دسته بندی به فارسی</label>
                    <input type="text" name="name_fa" class="form-control">
                  </div>
                </div>
                <br><br>

                <div class="col-md-5">
                  <div class="form-group">
                    <label class="bmd-label-floating">نام دسته بندی به انگلیسی</label>
                    <input type="text" name="name_en" class="form-control">
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
                      <button class="btn btn-primary" id="editParentButton">
                        {{$parent_id->name_fa}}
                      </button>
                      @elseif($parent_id=="root")
                      <input type="text" name="parent_id" class="form-control" value="" hidden>
                      <button class="btn btn-primary" id="editParentButton">
                        root
                      </button>
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