@extends('layouts.app')

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-11">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title">بلاگ ها</h4>
            <p class="card-category">لیست همه بلاگ ها</p>
          </div>
        <div class="card-body">
            @foreach ($blogs as $blog)
            <div class="row">
                <div class="col-md-9 mt-2" style="border-bottom: 2px solid rgba(194, 194, 194, 0.6);">
                    <h4 class="card-title">{{$blog->id}}</h4>
                    <div class="alert alert-info">
                        <span>{{$blog->title}}</span>
                    </div>
                </div>
                <form action="/admin/blogs/{{$blog->id}}" method="post" id="deleteForm" enctype="multipart/form-data">
                    @csrf
                    @method('delete')
                    <button type="submit" class="close mt-5 mr-3" style="height:25px;" >
                        <i class="material-icons" style="color:white;">delete</i>
                    </button>
                </form>
                <a href="/admin/blogs/{{$blog->id}}/edit" class="close mt-5">
                      <i class="material-icons" style="color:white;">edit</i>
                </a>
                
            </div>
            @endforeach

            
        </div>
    </div>
    </div>
      
    </div>
    <a href="{{route('blogs.create')}}" class="btn btn-primary d-flex add-button" style="font-size:22pt; color:#fff; ">+</a>
  </div>
</div>


<script src="{{asset('assets/js/core/jquery.min.js')}}"></script>
<script>
  // delete configuration doesn't work. find a new method
  $('#deleteForm').submit(function(){
    return confirm('آیا از پاک کردن این بلاگ اطمینان دارید؟');
  });
</script>
@endsection