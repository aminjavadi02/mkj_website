@extends('layouts.app')
@section('content')

<!-- show all images -->
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-11">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title">نمایش گالری</h4>
          </div>
          @if(!empty($images))
          <div class="card-body">
            <!-- start swiper -->
            <div class="swiper mySwiper">
              <div class="swiper-wrapper">
                    @foreach($images as $image)
                      <div class="swiper-slide col-md-4">
                        <img src="{{asset('storage/images/'.$image->name)}}" width="180px"/>
                        <!--delete and edit options -->
                        <!-- show under image -->
                        <form action="/galleries/{{$image->id}}" method="post" enctype="multipart/form-data">
                          <!-- confirm berfore submitting the form -->
                            @csrf
                            @method('delete')
                            <button type="submit" class="close" style=" height:25px; margin-top:40px; margin-right:10px;" >
                                <i class="material-icons" style="color:white;">delete</i>
                            </button>
                        </form>
                        <a href="/galleries/{{$image->id}}/edit" class="close" style=" height:25px; margin-top:37px">
                              <i class="material-icons" style="color:white">edit</i>
                        </a>
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
    @include('component.gallery.create')
  </div>
</div>



<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script>
  var swiper = new Swiper(".mySwiper", {
    effect: "coverflow",
    centeredSlides: true,
    slidesPerView: "auto",
    loop: true,
    coverflowEffect: {
      rotate: 50,
      stretch: 0,
      depth: 150,
      modifier: 3,
      slideShadows: false,
    },
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