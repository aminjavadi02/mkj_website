@extends('guest.en.layouts.app')
@section('content')
@include('guest.en.component.item.header')

<div class="items-container">
    <div class="row1">
        @foreach($items as $item)
        <div class="col-md-3">
            @include('guest.en.component.card.carditem')
        </div>
        @endforeach
    </div>
    <div class="button-container-2 row2">
          <a href="{{route('allItems','en')}}" class="button EnglishBtn2"><span>all Items</span></a>
    </div>
</div>

@endsection