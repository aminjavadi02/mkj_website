@extends('guest.en.layouts.app')
@section('content')
@include('guest.en.component.managers.indexHeader')
@if(!empty($manager))
<div class="oneManager-container">
    <div class="row">
        <div class="card" style="width: 18rem;">
            <div class="img-container">
                <img class="card-img-top" src="{{asset('storage/images/managers/'.$manager[0]->image_name)}}" alt="Card image cap">
            </div>
            <div class="card-body">
                <h5 class="card-title">{{$manager[0]->name_en}}</h5>
                <p class="card-text">{{$manager[0]->position_en}}</p>
                <div class="caption-container">
                    <div class="caption" id="caption"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    window.addEventListener('load', function(){
        var about_en = @json($manager[0]->about_en);
        $('#caption')[0].innerHTML = about_en;
    })
</script>

@endif
@endsection