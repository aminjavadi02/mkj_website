@extends('guest.fa.layouts.app')
@section('content')
@include('guest.fa.component.item.categoryList')
<!-- item -->
<div class="one-item-container">
    <div class="row">
        <div class="col-md-6 img-container">
            <div style="--swiper-navigation-color: #4B8377; --swiper-pagination-color: #000" class="swiper mySwiper2">
                <div class="swiper-wrapper">
                    @if(count($item['imagesList']) > 0)
                    @foreach($item['imagesList'] as $imageName)
                    <div class="swiper-slide">
                        <img src="{{asset('storage/images/item_images/'.$imageName)}}">
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
                    @foreach($item['imagesList'] as $imageName)
                    <div class="swiper-slide">
                        <img src="{{asset('storage/images/item_images/'.$imageName)}}">
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-md-6 details-container">
            <div class="details">
                <p class="main-title">مشخصات</p>

                <div class="detail">
                    <p class="title">نام کالا :</p>
                    <p class="value">{{$item['name']}}</p>
                </div>
                <div class="detail">
                    <p class="title">سایز :</p>
                    <p class="value">{{$item['size']}}</p>
                </div>
                <div class="detail">
                    <p class="title">آلیاژ :</p>
                    <p class="value">{{$item['alloy']}}</p>
                </div>
                
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <!-- description -->
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
@endsection

<!-- 
    swiper ro gozashtam baraye namayesh aks ha
    code style copy shodas bayad taghir kone khoshgel beshe
    onvar shafhe ham detail , desc , related items,
    hamash resposive beshe
 -->