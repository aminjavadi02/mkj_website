@extends('layouts.app')
@section('content')

<div class="card">
    <div class="card-body">
        <div class="container d-flex flex-column" style="text-align:right">
            <p>موضوع</p>
            <h4 class="card-title">{{$message->subject}}</h4>
            <hr>
        </div>

        <div class="container d-flex flex-column" style="text-align:right">
            <p>نام فرستنده:</p>
            <h6 class=" mb-2">{{$message->name}}</h6>
            <hr>
        </div>

        <div class="container d-flex flex-column" style="text-align:right">
            <p>آدرس ایمیل:</p>
            <h6 class=" mb-2">{{$message->email}}</h6>
            <hr>
        </div>

        <div class="container d-flex flex-column" style="text-align:right">
            <p>متن پیام:</p>
            <p class="card-text">{{$message->text}}</p>
            <hr>
        </div>
    </div>
</div>

@endsection