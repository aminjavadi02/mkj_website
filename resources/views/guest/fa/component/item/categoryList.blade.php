<div class="father-container">
    <div class="row">
    @foreach ($item['categoryList'] as $father)
       <h5 class="catList">{{$father}}</h5>
       <h6>/</h6>
    @endforeach
    <h5 class="catList">{{$item['name']}}</h5>
    </div>
</div>