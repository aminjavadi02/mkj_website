@if(!empty($items))
<div class="items-container" style="padding-bottom: 30px;">
  <div class="row1">
      @foreach($items as $item)
      <div class="col wrapper">
              @include('guest.fa.component.card.carditem')
      </div>
      @endforeach
  </div>
  <div class="row1 button-container-2">
    <a href="{{route('latestItems','fa')}}" class="button"><span>محصولات بیشتر</span></a>
  </div>
</div>
@endif

<!-- more items -->