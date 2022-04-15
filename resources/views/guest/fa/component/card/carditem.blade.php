<div class="card" style="width: 18rem;">
    @if(count($item['images']) > 0)
    <div class="item-img" style="background-image:url('{{asset('storage/images/item_images/'.$item['images'][0]['image_name'])}}')"></div>
    @else
    <div class="item-img no-img" style="text-align:center; padding-top:14vh;">no image</div>
    @endif                    
    <div class="card-body">
        @if($item['name_fa'])
        <h5 class="card-title">{{$item['name_fa']}}</h5>
        @endif
        @if($item['size'])
        <div class="info-container">
            <h4>{{$item['size']}}</h4>
            <h5>سایز</h5>
        </div>
        @endif
        @if($item['alloy'])
        <div class="info-container">
            <h4>{{$item['alloy']}}</h4>
            <h5>آلیاژ</h5>
        </div>
        @endif
        @if($item['category'])
        <div class="info-container">
            <h4>{{$item['category']['name_fa']}}</h4>
            <h5>دسته بندی</h5>
        </div>
        @endif
        <a href="/s/one-item/fa/{{$item['id']}}" class="btn btn-dark link"><span>مشاهده</span></a>
    </div>
</div>