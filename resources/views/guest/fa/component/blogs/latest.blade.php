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
                    <h4>{{$blog['time']}}</h4>
                </div>
                <div class="more">
                    <a href="{{route('showblog',$blog['id'])}}">بیشتر بخوانید</a>
                </div>
            </div>
        </li>
        @endforeach
        <div style="clear:both"></div>
    </ul>
</div>
<div class="button-4-container">
    <a href="{{route('allBlogs','fa')}}" class="button"><span>همه ی بلاگ ها</span></a>
</div>
@endif
@endsection