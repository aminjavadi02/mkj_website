@extends('layouts.app')
@section('content')

<div class="card">
    <div class="card-body">
        موضوع:
        <h4 class="card-title">{{$message->subject}}</h4>
        <hr>
        نام فرستنده:
        <h6 class="card-subtitle mb-2 text-muted">{{$message->name}}</h6>

        آدرس ایمیل:
        <h6 class="card-subtitle mb-2 text-muted">{{$message->email}}</h6>
        <hr>
        متن پیام:
        <p class="card-text">{{$message->text}}</p>
    </div>
</div>

@endsection