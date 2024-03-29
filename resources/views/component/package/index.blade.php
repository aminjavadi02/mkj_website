@extends('layouts.app')

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-11">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title">بسته بندی ها</h4>
            <p class="card-category">لیست همه بسته بندی ها</p>
          </div>
        <div class="card-body">
            <table class="table">
            <thead class="thead-dark">
                <tr>
                <th scope="col">#</th>
                <th scope="col">نام فارسی</th>
                <th scope="col">نام انگلیسی</th>
                </tr>
            </thead>
            <tbody>
                @foreach($packages as $package)
                <tr>
                    <th scope="row">{{$package->id}}</th>
                    <td>{{$package->name_fa}}</td>
                    <td>{{$package->name_en}}</td>
                    <td class="d-flex justify-content-center">
                        <a href="/admin/packages/{{$package->id}}/edit"><span class="material-icons" style="color:white;">edit</span></a>
                        <form action="/admin/packages/{{$package->id}}" method="post" id="deleteForm" enctype="multipart/form-data">
                            <!-- delete confirmation needed -->
                            @csrf
                            @method('delete')
                            <button type="submit" class="close">
                                <i class="material-icons" style="color:white;">delete</i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
            </table>
        </div>
    </div>
    </div>
      
    </div>
    <a href="{{route('packages.create')}}" class="btn btn-primary d-flex add-button" style="font-size:22pt; color:#fff; ">+</a>
  </div>
</div>

<script src="{{asset('assets/js/core/jquery.min.js')}}"></script>
<script>

</script>
@endsection