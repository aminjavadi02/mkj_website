@extends('layouts.app')
@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-11">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title">شماره تلفن ها</h4>
          </div>
        <div class="card-body">
            <div class="table-responsive">
            <table class="table table-sm">
            <thead class="thead-dark">
                <tr>
                <th scope="col">#</th>
                <th scope="col">نام </th>
                <th scope="col">سمت</th>
                <th scope="col">شماره</th>
                </tr>
            </thead>
            <tbody>
                @foreach($callinfos as $callinfo)
                <tr>
                    <th scope="row">{{$callinfo->id}}</th>
                    <td>{{$callinfo->name_fa}}</td>
                    <td>{{$callinfo->position_fa}}</td>
                    <td>{{$callinfo->phone_number}}</td>
                    <td class="d-flex justify-content-center">
                        <a href="/admin/callinfo/{{$callinfo->id}}/edit"><span class="material-icons" style="color:white;">edit</span></a>
                        <form action="/admin/callinfo/{{$callinfo->id}}" method="post" id="deleteForm" enctype="multipart/form-data">
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
      
    </div>
    <a href="{{route('callinfo.create')}}" class="btn btn-primary d-flex add-button" style="font-size:22pt; color:#fff; ">+</a>
  </div>
</div>
@endsection