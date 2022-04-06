@if(!empty($items))
<div class="items-container" style="
background-image:url('{{asset('assets/img/42883.jpg')}}');
padding-bottom: 30px;
background-size: cover;
background-repeat: no-repeat;
">
  <div class="row1">
      @foreach($items as $item)
      <div class="col-md-3">
              @include('guest.en.component.card.carditem')
      </div>
      @endforeach
      <div class="button-container-2">
          <a href="{{route('latestItems','en')}}" class="button"><span>More Items</span></a>
      </div>
  </div>
</div>
@endif

<!-- more items -->