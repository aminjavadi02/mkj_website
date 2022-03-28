<div class="father-container">
    <div class="row">
    <h5 class="catList">{{$item['name']}}</h5>
    <h6>/</h6>
    @foreach ($item['categoryList'] as $father)
       <a href="/cats/fa/{{$father['id']}}"><h5 class="catList">{{$father['name']}}</h5></a>
       <h6>/</h6>
    @endforeach    
    </div>
</div>