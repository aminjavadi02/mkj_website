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
                      <div class="swiper-slide col-md-4 col-md-4 d-flex flex-column justify-content-between" style="height: 360px;">
                        <div class="d-flex flex-column bd-highlight">
                          <!-- if image -> img if video ->vid -->
                          @if($image->is_image)
                          <img src="{{asset('storage/images/gallery/'.$image->image_name)}}" width="200px"/>
                          <form action="/admin/galleries/{{$image->id}}" method="post" class="d-flex p-0 delete-form" id="deleteForm" enctype="multipart/form-data">
                              @csrf
                              @method('delete')
                              <button type="submit" class="close" style=" height:25px; margin-top:40px; margin-right:10px;" >
                                  <i class="material-icons" style="color:white;">delete</i>
                              </button>
                          </form>
                          @else
                          <video src="{{asset('storage/videos/gallery/'.$image->image_name)}}" width="200px" height="300px" controls></video>
                          <form action="/admin/videos/{{$image->id}}" method="post" class="d-flex p-0 delete-form" id="deleteForm" enctype="multipart/form-data">
                              @csrf
                              @method('delete')
                              <button type="submit" class="close" style=" height:25px; margin-top:40px; margin-right:10px;" >
                                  <i class="material-icons" style="color:white;">delete</i>
                              </button>
                          </form>
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
    @include('component.gallery.create')
  </div>
</div>



<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script src="{{asset('assets/js/core/jquery.min.js')}}"></script>
<script>

// this is not working
  $('#deleteForm').submit(function(){
    return confirm('آیا از پاک کردن این عکس اطمینان دارید؟');
  });

  var swiper = new Swiper(".mySwiper", {
    centeredSlides: true,
    slidesPerView: "auto",
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