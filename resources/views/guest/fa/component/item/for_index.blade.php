<div class="item-container" style="background-image:url('{{asset('assets/img/42883.jpg')}}')">
    @foreach($itemImages as $item)
      <div class="card">
          <div class="box">
              <div class="content">
                @if($item['images'])
                <div class="item-img" style="background-image:url('{{asset('storage/images/item_images/'.$item['images'][0]['name'])}}')"></div>
                @else
                <div class="item-img no-img" style="text-align:center; padding-top:14vh;">no image</div>
                @endif
                <div class="name">{{$item['item']}}</div>
                <div class="link"><a href="#" class="more">بیشتر</a></div>
              </div>
          </div>
      </div>  
    @endforeach
    <div class="button-container-2">
        <a href="#" class="button"><span>محصولات بیشتر</span></a>
    </div>
</div>

<!-- more items -->