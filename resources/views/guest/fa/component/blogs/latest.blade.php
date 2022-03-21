@extends('guest.fa.layouts.app')
@section('content')
@include('guest.fa.component.blogs.header')

@if(!empty($blogs))
<div class="blogs-timeline">
    <ul>
        @foreach($blogs as $blog)
        <li>
            <div class="bg-area">
                <div class="content">
                    <h3>{{$blog['title']}}</h3>
                    <p>{{$blog['abstract']}}</p>
                    <a href="{{route('showblog',$blog['id'])}}">بیشتر بخوانید</a>
                </div>
                <div class="time">
                    <h4>{{$blog['time']}}</h4>
                </div>
            </div>
        </li>
        @endforeach
        <div style="clear:both"></div>
    </ul>
</div>
<div class="button-4-container">
    <a href="{{route('allBlogs','fa')}}">همه ی بلاگ ها</a>
</div>
@endif
@endsection