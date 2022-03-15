<!-- $aboutus $itemImages $galleryImages -->
@extends('guest.fa.layouts.app')
@section('content')

@include('guest.fa.component.index.header')
@include('guest.fa.component.gallery.galleryScroller')
<br>
@include('guest.fa.component.aboutus.aboutus-short')
@include('guest.fa.component.item.for_index')
@include('guest.fa.component.contactus.contactus')
@endsection