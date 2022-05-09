<div class="father-container EngFatherContainer">
    <div class="row">
        @foreach ($item['categoryList'] as $father)
        <a href="/s/cats/en/{{$father['id']}}"><h5 class="catList EngFont">{{$father['name']}}</h5></a>
        <h6> &ensp; / &ensp; </h6>
        @endforeach
        <h6>&ensp;</h6>
        <h5 class="catList EngFont">{{$item['name']}}</h5>
    </div>
</div>