@extends('guest.fa.layouts.app')
@section('content')
<div class="backgroundarea">
    <div class="row catgrid">
        <div class="col-md-6 textArea">
            <div class="title">
                دسته بندی ها
            </div>
            <p class="text">
                با کلیلک روی هر دسته بندی به محصولات آن دسترسی پیدا کنید
            </p>
        </div>
        <div class="col-md-6 categoryList-container">
            @include('inc.messages')
            <ul id="tree" class="category_ul"></ul>
        </div>
    </div>
</div>


<!-- jquery -->
<script src="{{asset('assets/js/core/jquery.min.js')}}"></script>
<script>
    window.onload = function(){
        var treeObject = @json($categories);
        const ul = $('#tree');
        drawTree(treeObject,ul[0]);
    }
    function drawTree(treeObject, ul){
        // treeObject is an object. foreach works only on array. so i had to use for.
        for(branch in treeObject){
            const li = document.createElement('li');
            const div = document.createElement('div');
            const a = document.createElement('a');
            
            a.setAttribute('for',treeObject[branch]['id']);
            a.setAttribute('href','/cats/fa/'+treeObject[branch]['id'])
            a.innerText = treeObject[branch]['name_fa'];
            a.style.cursor = 'pointer';
            a.style.textDecoration = 'none';
            a.classList.add('category_link');

            div.appendChild(a);
            div.classList.add('inputAndLabel');

            li.appendChild(div);
            li.classList.add('category_li');

            // do the children the same
            if(treeObject[branch].children.length > 0){
                var newUl = document.createElement('ul');
                newUl.classList.add('category_ul');
                newUl.classList.add('nested');
                li.appendChild(newUl);
                // making the function recursive to cover all children
                drawTree(treeObject[branch].children, newUl);
            }
            ul.appendChild(li);
        }
    }
</script>




@endsection