@extends('guest.fa.layouts.app')
@section('content')
@include('guest.fa.component.item.header')

<div class="items-container">
    <div class="row">
        @foreach($items as $item)
        <div class="col-md">
            <div class="card" style="width: 18rem;">
                <div class="img-container">
                @if(count($item['images']) > 0)
                <div class="item-img" style="background-image:url('{{asset('storage/images/item_images/'.$item['images'][0]['image_name'])}}')"></div>
                @else
                <div class="item-img no-img" style="text-align:center; padding-top:14vh;">no image</div>
                @endif                    
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{$item['name_fa']}}</h5>
                    <a href="{{route('oneItem','fa/'.$item['id'])}}" class="btn btn-dark">مشاهده</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection