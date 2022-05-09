@extends('guest.en.layouts.app')
@section('content')
@include('guest.en.component.blogs.header')

@if(!empty($blogs))
<div class="blogs-timeline allBlogs">
    <ul>
        @foreach($blogs as $blog)
        <li>
            <div class="bg-area EngBlogList">
                <div class="content">
                    <h3>{{$blog['title']}}</h3>
                    <h4>{{$blog['time']}}</h4>
                </div>
                <div class="more">
                    <a href="{{route('showblog',$blog['id'].'/en')}}" class="EngFont">Read More</a>
                </div>
            </div>
        </li>
        @endforeach
        <div style="clear:both"></div>
    </ul>
</div>
@endif
@endsection