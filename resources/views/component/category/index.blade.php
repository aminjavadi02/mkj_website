@extends('layouts.app')
@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-11">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title">همه دسته بندی ها</h4>
          </div>
          <div class="card-body">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                  <div class="form-group tree">
                    <!-- show all cats as ul li here -->
                    <ul id="tree" class="category_ul"></ul>
                    <input type="text" id="parent_id_input" name="parent_id" hidden>
                  </div>
                  </div>
                </div>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="{{asset('assets/js/core/jquery.min.js')}}"></script>
<script>
window.onload = function() {
    // to toggle the ul in categories
    // important: make this responsive
    var toggler = $(".caret");
    for ( var i = 0; i < toggler.length; i++) {
        toggler[i].onclick = function() {
        $(this).toggleClass("caret-down");
        this.parentElement.querySelector(".nested").classList.toggle("active");
        }
    }
}

function drawTree(treeObject, ul){
    // treeObject is an object. foreach works only on array. so i had to use for.
    for(branch in treeObject){
        const li = document.createElement('li');
        const span = document.createElement('span');
        const div = document.createElement('div');
        const input = document.createElement('input');
        const label = document.createElement('label');
        

        input.setAttribute('type', 'radio');
        input.setAttribute('name','parent_id');
        input.setAttribute('value',treeObject[branch]['id']);
        input.setAttribute('id',treeObject[branch]['id']);

        label.setAttribute('for',treeObject[branch]['id']);
        label.innerText = treeObject[branch]['name_fa'];
        label.style.cursor = 'pointer';
        label.classList.add('category_input');

        div.appendChild(input);
        div.appendChild(label);
        div.classList.add('inputAndLabel');

        li.appendChild(div);
        li.classList.add('category_li');

        // the triangle thing tag
        span.classList.add('caret');

        // right click menu
        label.addEventListener('contextmenu',async function(e){
            e.preventDefault();
            // create contextmenu done
            // style it  done
            // function it

            // e.target.control.value ====> id of selected input
            const contextmenu = await createRightClickMenu(e.target.control.value);
            contextmenu.style.top = e.offsetY + "px";
            contextmenu.style.left = e.offsetX + "px";
            contextmenu.classList.add('active');
            label.appendChild(contextmenu);
            // shows the menu but not in right place
            // add functionality to items too

            
        });

        if(treeObject[branch].children.length > 0){
            var newSpan = document.createElement('span');
            newSpan.classList.add('caret');

            var newUl = document.createElement('ul');
            newUl.classList.add('category_ul');
            newUl.classList.add('nested');

            li.appendChild(newSpan);
            li.appendChild(newUl);
            
            // making the function recursive to cover all children
            drawTree(treeObject[branch].children, newUl);
        }
        ul.appendChild(li);
    }
}

function openUl(){
    // to hide the selected li and show the ul
    $('#tree').removeClass('nested');
    $('#tree').addClass('active');
    $('#editParentButton').remove();
}

function createRightClickMenu(id){
    const contextMenu = document.createElement('div');
    const list = document.createElement('div');

    contextMenu.setAttribute('id','contextmenu');
    list.classList.add('list');

    listOfActions =['addchild','edit','delete'];

    for(var i=0; i<listOfActions.length; i++){
        const item = document.createElement('div');
        item.classList.add('item');
        item.innerText = listOfActions[i];
        list.appendChild(item);
    }
    contextMenu.appendChild(list);
    return contextMenu;
}



const ul = $('#tree');
// ul is an object. ul[0] is the tag itself.
var treeObject = @json($tree);
// @ json(laravelValue) -> turns laravel object to json object
drawTree(treeObject,ul[0]);
</script>

@endsection