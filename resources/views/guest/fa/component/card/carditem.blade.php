
<div class="card" style="width: 18rem;">
    @if(count($item['images']) > 0)
    <div class="item-img" style="background-image:url('{{asset('storage/images/item_images/'.$item['images'][0]['image_name'])}}')"></div>
    @else
    <div class="item-img no-img" style="text-align:center; padding-top:14vh;">no image</div>
    @endif                    
    <div class="card-body">
        <h5 class="card-title">{{$item['name_fa']}}</h5>
        <div class="info-container">
            <h5>سایز:</h5>
            <h4>{{$item['size']}}</h4>
        </div>
        <div class="info-container">
            <h5>آلیاژ:</h5>
            <h4>{{$item['alloy']}}</h4>
        </div>
        <div class="info-container">
            <h5>دسته بندی:</h5>
            <h4>{{$item['category']['name_fa']}}</h4>
        </div>
        <a href="{{route('oneItem','fa/'.$item['id'])}}" class="btn btn-dark link"><span>مشاهده</span></a>
    </div>
</div>