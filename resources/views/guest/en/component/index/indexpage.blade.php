<!-- $aboutus $itemImages $galleryImages -->
@extends('guest.en.layouts.app')
@section('content')

@include('guest.en.component.index.header')
@include('guest.en.component.gallery.galleryScroller')
<br>
@include('guest.en.component.aboutus.aboutus-short')
@include('guest.en.component.item.for_index')
@include('guest.en.component.contactus.contactus')
@endsection