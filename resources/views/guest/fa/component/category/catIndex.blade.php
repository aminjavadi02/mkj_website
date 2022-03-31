@extends('guest.fa.layouts.app')
@section('content')

<div class="backgroundarea">
    <div class="categoryObject-container">
        <ul class="main-list">
        </ul>
    </div>
</div>


<!-- jquery -->
<script src="{{asset('assets/js/core/jquery.min.js')}}"></script>
<script>
    window.onload = function(){
        var categoryObject = @json($categories);
        var categoryArray = objToArray(categoryObject);
        const ul = $('.main-list')
        makeUl(categoryArray,ul[0]);
    }

    function objToArray(obj){
        theArray = [];
        for(i in obj){
            theArray.push(obj[i]);
        }
        return theArray;
    }

    function makeUl(list,ul) {
        for(i in list){
            if(list[i].parent_id == null){
                // is root
                if(list[i].children.length > 0){
                    // is root and ul
                    const UlTag = document.createElement('ul');
                    UlTag.innerText = list[i].name_fa;
                    UlTag.parent_id = list[i].parent_id;
                    UlTag.id = list[i].id;
                    UlTag.classList.add('root-list');
                    ul.appendChild(UlTag);
                    // children is array of objects. no need to make array
                    makeUl(list[i].children,UlTag);
                }
                else{
                    // is root and li
                    const LiTag = document.createElement('li');
                    LiTag.innerText = list[i].name_fa;
                    LiTag.parent_id = list[i].parent_id;
                    LiTag.id = list[i].id;
                    LiTag.classList.add('root-list');
                    ul.appendChild(LiTag);
                }
            }
            else{
                // is not root. parent_id == something else's id
                if(list[i].children.length > 0){
                    // is ul
                    const UlTag = document.createElement('ul');
                    UlTag.innerText = list[i].name_fa;
                    UlTag.parent_id = list[i].parent_id;
                    UlTag.id = list[i].id;
                    UlTag.classList.add('sub-list');
                    ul.appendChild(UlTag);
                    // children is array of objects. no need to make array
                    makeUl(list[i].children,UlTag);
                }
                else{
                    // is li
                    const LiTag = document.createElement('li');
                    LiTag.innerText = list[i].name_fa;
                    LiTag.parent_id = list[i].parent_id;
                    LiTag.id = list[i].id;
                    LiTag.classList.add('sub-list');
                    ul.appendChild(LiTag);
                }
            }
        }
    }
</script>




@endsection