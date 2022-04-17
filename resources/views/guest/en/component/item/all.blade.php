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
</div>

@endsection