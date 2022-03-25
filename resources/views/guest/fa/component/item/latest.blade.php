@extends('guest.fa.layouts.app')
@section('content')
@include('guest.fa.component.item.header')

<div class="items-container">
    <div class="row1">
        @foreach($items as $item)
        <div class="col-md-3">
            @include('guest.fa.component.card.carditem')
        </div>
        @endforeach
    </div>
    <div class="row2">
        <a href="{{route('allItems','fa')}}"><button class="btn btn-primary more">همه محصولات</button></a>
    </div>
</div>

@endsection