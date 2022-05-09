@extends('guest.en.layouts.app')
@section('content')
@include('guest.en.component.managers.indexHeader')
@if(!empty($managers))
<div class="manager-container">
    <div class="row">
      @foreach($managers as $manager)
      <div class="col-md">
        <div class="card" style="width: 18rem;">
            <div class="img-container">
                <a href="{{route('showAmanager',$manager->id.'/en')}}">
                <img class="card-img-top" src="{{asset('storage/images/managers/'.$manager->image_name)}}" alt="Card image cap">
                </a>
            </div>
            <div class="card-body">
                <h5 class="card-title EngFont">{{$manager->name_en}}</h5>
                <p class="card-text EngFont">{{$manager->position_en}}</p>
                <a href="{{route('showAmanager',$manager->id.'/en')}}" class="more EngFont">more</a>
            </div>
        </div>
      </div>
      @endforeach
    </div>
</div>
@endif
@endsection