@extends('guest.fa.layouts.app')
@section('content')

<div class="backgroundarea">
    <div class="categoryList-container">
        <ul class="main-list">
        </ul>
    </div>
</div>


<!-- jquery -->
<script src="{{asset('assets/js/core/jquery.min.js')}}"></script>
<script>
    window.onload = function(){
        var categoryList = @json($categories);
        const ul = $('.main-list')
        makeUl(categoryList,ul[0]);
    }
    
    function makeUl(list,ul) {
        for( item in list){
            if(list[item].children.length > 0){
                const UlTag = document.createElement('ul');
                UlTag.innerText = list[item].name_fa;
                UlTag.classList.add('sub-list');
                ul.appendChild(UlTag);
                makeUl(list[item].children,UlTag);
            }
            else{
                const LiTag = document.createElement('li');
                LiTag.innerText = list[item].name_fa;
                ul.appendChild(LiTag);
            }
        }
    }
</script>




@endsection