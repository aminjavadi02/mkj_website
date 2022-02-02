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
                <div class="col-md-9">
                    <h4 class="card-title">{{$blog->id}}</h4>
                    <div class="alert alert-info">
                        <span>{{$blog->title}}</span>
                    </div>
                </div>
                <form action="/blogs/{{$blog->id}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('delete')
                    <button type="submit" class="close" style=" height:25px; margin-top:40px; margin-right:10px;" >
                        <i class="material-icons" style="color:white;">delete</i>
                    </button>
                </form>

                
                <a href="/blogs/{{$blog->id}}/edit" class="close" style=" height:25px; margin-top:37px">
                      <i class="material-icons" style="color:white">edit</i>
                </a>
                
            </div>
            @endforeach

            
        </div>
    </div>
    </div>
      
    </div>
  </div>
</div>
@endsection