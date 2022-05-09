@extends('guest.en.layouts.app')
@section('content')

<div class="backgroundarea">
    <div class="pageName EngPageName">
        <p class="EngFont">category items:</p>
        <p class="EngFont">{{$pagename}}</p>
    </div>
    <hr>
<div class="items-container nobg">
    <div class="row1">
        @foreach($items as $lists)
            @foreach($lists as $item)
            <div class="col-md-3">
                @include('guest.en.component.card.carditem')
            </div>
            @endforeach
        @endforeach
    </div>
</div>
</div>

@endsection