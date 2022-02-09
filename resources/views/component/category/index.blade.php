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

// to hide contextmenu after clicking somewhere else
window.onclick = function(){
  $('#contextmenu').removeClass('active');
};

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

        // right click on labels
        label.addEventListener('contextmenu',async function(e){
            e.preventDefault();
            // create contextmenu done
            // style it  done
            // function it

            // if there's already a contextmenu on page, remove it first
            if( $('#contextmenu').length > 0 ){
              $('#contextmenu').remove();
            }
            // e.target.control.value ====> id of selected input
            const contextmenu = await createRightClickMenu(e.target.control.value,e.offsetY,e.offsetX);
            contextmenu.classList.add('active');
            label.appendChild(contextmenu)
        });

        // do the children the same
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


// create the right click menu
function createRightClickMenu(id,y,x){
    const contextMenu = document.createElement('div');
    const list = document.createElement('div');

    contextMenu.setAttribute('id','contextmenu');
    list.classList.add('list');

    
    // adding icon and name to items. icons are from material-icons
    listOfIcons =['edit','remove_circle','subdirectory_arrow_right'];
    for(var i=0; i<listOfIcons.length; i++){
        const item = document.createElement('a');
        const icon = document.createElement('span');
       
        icon.classList.add('material-icons');
        icon.innerText = listOfIcons[i];

        var route = 
        console.log(route);


        /**
         * needed changes:
         * route to delete
         * route to add child
         * 
         */

        switch(listOfIcons[i]){
          case 'edit':
            item.setAttribute('href',"{{url('categories/"+id+"/edit')}}");
            item.innerText = "edit";
            break;
          case 'remove_circle':
            item.setAttribute('href',"#");
            item.innerText = "delete";
            break;
          case 'subdirectory_arrow_right':
            item.setAttribute('href',"#");
            item.innerText = "add child";
            break;
        }
        item.classList.add('item');
        item.appendChild(icon);
        list.appendChild(item);
    }

    // fixing position of menu apeartion
    contextMenu.style.top = y + "px";
    contextMenu.style.left = x + "px";
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