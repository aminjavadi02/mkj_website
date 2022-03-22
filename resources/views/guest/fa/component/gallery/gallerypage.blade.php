@extends('guest.fa.layouts.app')
@section('content')
@include('guest.fa.component.gallery.header')
<div class="content">
  <div class="container-fluid gallery-container">
    <div class="row">
      <div class="col-12">
        <div class="card">
          @if(!empty($gallery))
          <div class="card-body">
            <!-- start swiper -->
            <div class="swiper mySwiper" style="margin-top: 18vh">
              <div class="swiper-wrapper">
                    @foreach($gallery as $image)
                      <div class="swiper-slide col-md-4 col-md-4 d-flex flex-column justify-content-between" style="height: 360px;">
                        <div class="d-flex flex-column bd-highlight">
                          <!-- if image -> img if video ->vid -->
                          @if($image->is_image)
                          <img src="{{asset('storage/images/gallery/'.$image->image_name)}}"/>
                          @else
                          <video src="{{asset('storage/videos/gallery/'.$image->image_name)}}" controls></video>
                          @endif

                        </div>
                      </div>
                    @endforeach
              </div>
              <div class="swiper-button-next"></div>
              <div class="swiper-button-prev"></div>
              <br><br>
              <div class="swiper-pagination"></div>
            </div>
            <!-- end of swiper -->
          </div>
          @endif
        </div>
      </div>
    </div>
  </div>
</div>

<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script src="{{asset('assets/js/core/jquery.min.js')}}"></script>
<script>
    var swiper = new Swiper(".mySwiper", {
    centeredSlides: true,
    slidesPerView: "auto",
    loop: true,
    pagination: {
          el: ".swiper-pagination",
          clickable: true,
    },
    navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
    },
    
  });
</script>
@endsection