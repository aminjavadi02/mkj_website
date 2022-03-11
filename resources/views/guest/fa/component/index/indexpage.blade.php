<!-- $aboutus $itemImages $galleryImages -->
@extends('guest.fa.layouts.app')
@section('content')

@include('guest.fa.component.index.header')
@include('guest.fa.component.gallery.galleryScroller')
<br>
@include('guest.fa.component.aboutus.aboutus-short')
@endsection