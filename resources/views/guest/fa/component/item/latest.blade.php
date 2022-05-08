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
    
    <div class="row2 button-container-2">
    <a href="{{route('allItems','fa')}}" class="button"><span>همه محصولات</span></a>
  </div>
</div>

@endsection