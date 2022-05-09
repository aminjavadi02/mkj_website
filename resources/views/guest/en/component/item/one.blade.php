@extends('guest.en.layouts.app')
@section('content')
@include('guest.en.component.item.categoryList')
<div class="one-item-container">
    <div class="row1">
        <div class="col-md-6 img-container">
            <div style="--swiper-navigation-color: #4B8377; --swiper-pagination-color: #000" class="swiper mySwiper2">
                <div class="swiper-wrapper">
                    @if(count($item['imagesList']) > 0)
                    @foreach($item['imagesList'] as $imageName)
                    <div class="swiper-slide">
                        <img src="{{asset('storage/images/item_images/'.$imageName)}}" onclick="this.parentElement.parentElement.parentElement.requestFullscreen()">
                    </div>
                    @endforeach
                    @else
                    <div class="swiper-slide">
                        <div class="no-image">no images</div>
                    </div>
                    @endif
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
            <div thumbsSlider="" class="swiper mySwiper">
                <div class="swiper-wrapper">
                @if(count($item['imagesList']) > 0)
                    @foreach($item['imagesList'] as $imageName)
                    <div class="swiper-slide">
                        <img src="{{asset('storage/images/item_images/'.$imageName)}}">
                    </div>
                    @endforeach
                @endif
                </div>
            </div>
        </div>
        <div class="col-md-6 details-container">
            <div class="details">
                <p class="main-title EngTitle EngFont">details :</p>
                <hr>
                @if($item['name'])
                <div class="detail">
                    <p class="value EngFont">{{$item['name']}}</p>
                    <p class="title EngFont">: name</p>
                </div>
                <hr>
                @endif
                @if($item['size'])
                <div class="detail">
                    <p class="value EngFont">{{$item['size']}}</p>
                    <p class="title EngFont">: size</p>
                </div>
                <hr>
                @endif
                @if($item['alloy'])
                <div class="detail">
                    <p class="value EngFont">{{$item['alloy']}}</p>
                    <p class="title EngFont">: alloy</p>
                </div>
                <hr>
                @endif
                @if(count($item['packagesList']) > 0)
                <div class="detail">
                    <ul class="listvalue">
                        @foreach($item['packagesList'] as $package)
                        <li class="EngFont">{{$package}}</li>
                        @endforeach
                    </ul>
                    <p class="title EngFont">: packaging</p>
                </div>
                <hr>
                @endif
            </div>
        </div>
    </div>
    <div class="row2">
        <div class="col description-containrt">
            <div class="title EnglishDescription EngFont">
                description
            </div>
            <hr>
            @if($item['description'])
            <div class="description" id="description"></div>
            @endif
        </div>
    </div>
</div>

<!-- related items -->
<div class="related-items-container">
    <!-- swiper -->
</div>



<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<!-- Initialize Swiper -->
<script>
    var swiper = new Swiper(".mySwiper", {
    loop: false,
    spaceBetween: 10,
    slidesPerView: 4,
    freeMode: true,
    watchSlidesProgress: true,
    });
    var swiper2 = new Swiper(".mySwiper2", {
    loop: true,
    spaceBetween: 10,
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    thumbs: {
        swiper: swiper,
    },
    });
</script>

<script>
    window.addEventListener('load', function(){
        var description = @json($item['description']);
        $('#description')[0].innerHTML = description;
    })
</script>
@endsection