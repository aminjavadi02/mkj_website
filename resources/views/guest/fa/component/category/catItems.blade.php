@extends('guest.fa.layouts.app')
@section('content')

<div class="backgroundarea">
    <div class="pageName">
        <p>نمایش محصولات دسته بندی: </p>
        <p>{{$pagename}}</p>
    </div>
    <hr>
<div class="items-container nobg">
    <div class="row1">
        @foreach($items as $lists)
            @foreach($lists as $item)
            <div class="col-md-3">
                @include('guest.fa.component.card.carditem')
            </div>
            @endforeach
        @endforeach
    </div>
</div>
</div>

@endsection