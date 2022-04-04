@extends('guest.fa.layouts.app')
@section('content')
@include('guest.fa.component.managers.indexHeader')
@if(!empty($managers))
<div class="manager-container">
    <div class="row">
      @foreach($managers as $manager)
      <div class="col-md">
        <div class="card" style="width: 18rem;">
            <div class="img-container">
                <a href="{{route('showAmanager',$manager->id.'/fa')}}">
                <img class="card-img-top" src="{{asset('storage/images/managers/'.$manager->image_name)}}" alt="Card image cap">
                </a>
            </div>
            <div class="card-body">
                <h5 class="card-title">{{$manager->name_fa}}</h5>
                <p class="card-text">{{$manager->position_fa}}</p>
                <a href="{{route('showAmanager',$manager->id.'/fa')}}" class="more">بیشتر</a>
            </div>
        </div>
      </div>
      @endforeach
    </div>
</div>
@endif
@endsection