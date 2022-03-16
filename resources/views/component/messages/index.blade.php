@extends('layouts.app')
@section('content')

<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-11">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title">پیام ها</h4>
          </div>
        <div class="card-body">
            <div class="table-responsive">
            <table class="table">
            <thead class="thead-dark">
                <tr>
                <th scope="col">عنوان پیام</th>
                <th scope="col">نام فرستنده</th>
                <th scope="col">ایمیل</th>
                <th scope="col">تاریخ ارسال</th>
                </tr>
            </thead>
            <tbody>
                @foreach($messages as $message)
                <tr>
                    <th scope="row">{{$message->subject}}</th>
                    <td>{{$message->name}}</td>
                    <td>{{$message->email}}</td>
                    <td>{{$message->created_at}}</td>
                    <td class="d-flex justify-content-center">
                        <a href="/admin/messages/{{$message->id}}"><span class="material-icons" style="color:white;">visibility</span></a>
                        <form action="/admin/messages/{{$message->id}}" method="post" id="deleteForm" enctype="multipart/form-data">
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
  </div>
</div>
@endsection