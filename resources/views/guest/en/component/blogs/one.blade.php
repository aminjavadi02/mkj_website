@extends('guest.en.layouts.app')
@section('content')
@include('guest.en.component.blogs.oneheader')

<div class="oneblog-container">
    <div class="row blog-text" id="blog-text"></div>
</div>

<script>
    window.addEventListener('load', function(){
        var text = @json($blog['text']);
        $('#blog-text')[0].innerHTML = text;
    })
</script>
@endsection