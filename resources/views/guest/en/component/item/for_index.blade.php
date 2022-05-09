@if(!empty($items))
<div class="items-container" style="
padding-bottom: 30px;
background-size: cover;
background-repeat: no-repeat;
">
  <div class="row1">
      @foreach($items as $item)
      <div class="col-md-3 EnglishItemCard">
              @include('guest.en.component.card.carditem')
      </div>
      @endforeach
      <div class="button-container-2">
          <a href="{{route('latestItems','en')}}" class="button EngFont"><span>More Items</span></a>
      </div>
  </div>
</div>
@endif

<!-- more items -->