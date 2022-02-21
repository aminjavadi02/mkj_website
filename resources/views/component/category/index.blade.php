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
    <!-- to add a root node -->
    <a href="{{url('/categories/root/create')}}" class="btn btn-primary d-flex add-button" style="font-size:22pt; color:#fff; ">+</a>
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
        
        // input is the radio buttons to select parent
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
        label.addEventListener('contextmenu', function(e){
            e.preventDefault();

            // if there's already a contextmenu on page, remove it first
            if( $('#contextmenu').length > 0 ){
              $('#contextmenu').remove();
            }
            // e.target.control.value ====> id of selected input
            const contextmenu = createRightClickMenu(e.target.control.value,e.offsetY,e.offsetX);
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
}


// create the right click menu
function createRightClickMenu(id,y,x){
  
    const contextMenu = document.createElement('div');
    const list = document.createElement('div');

    contextMenu.id = 'contextmenu';
    list.classList.add('list');

    const showItems = createShowAction(id);
    list.appendChild(showItems);
    
    const edit = createEditAction(id);
    list.appendChild(edit);

    const deleteForm = createDeleteAction(id);
    list.appendChild(deleteForm);

    const addChild = createAddChildAction(id);
    list.appendChild(addChild);

        /**
         * needed changes:
         * route to add child
         * 
         */

    // fixing position of menu apeartion
    contextMenu.style.top = y + "px";
    contextMenu.style.left = x + "px";
    contextMenu.appendChild(list);

    return contextMenu;
}

function createDeleteAction(id){
  const deleteForm = document.createElement('form');
  deleteForm.method = 'post';
  deleteForm.action = `/categories/${id}`;
  deleteForm.className = 'item'
  deleteForm.id = 'deleteForm';
  deleteForm.innerText = 'delete';
  deleteForm.addEventListener('click', function(){
    if(confirm('آیا از حذف این دسته بندی و فرزندانش اطمینان دارید؟')){
      deleteForm.submit();
    }
  })
  
  // set method
  const inputmethod = document.createElement('input');
  inputmethod.type = 'hidden';
  inputmethod.name = '_method';
  inputmethod.value = 'delete';
  deleteForm.appendChild(inputmethod);

  // set csrf
  const inputcsrf = document.createElement('input');
  inputcsrf.type = 'hidden';
  inputcsrf.name = '_token';
  inputcsrf.value = '{{csrf_token()}}';
  deleteForm.appendChild(inputcsrf);

  // delete icon from material design
  const deleteIcon = document.createElement('span');
  deleteIcon.className = 'material-icons';
  deleteIcon.innerText = 'remove_circle';
  deleteForm.appendChild(deleteIcon);

  return deleteForm;
}

function createEditAction(id){
  const edit = document.createElement('a');
  edit.classList.add('item');
  edit.setAttribute('href',`/categories/${id}/edit`);
  edit.innerText = 'edit';

  // icon from material design
  const editIcon = document.createElement('span');
  editIcon.classList.add('material-icons');
  editIcon.innerText = 'edit';
  edit.appendChild(editIcon);

  return edit;
}

function createAddChildAction(id){
  const addchild = document.createElement('a');
  addchild.classList.add('item');
  addchild.setAttribute('href',`/categories/${id}/create`);
  addchild.innerText = 'add child';

  // icon from material design
  const addchildIcon = document.createElement('span');
  addchildIcon.classList.add('material-icons');
  addchildIcon.innerText = 'subdirectory_arrow_right';
  addchild.appendChild(addchildIcon);

  return addchild;
}

function createShowAction(id){
  const showItems = document.createElement('a');
  showItems.classList.add('item');
  showItems.innerText = 'show items';
  showItems.setAttribute('href',`/categories/${id}`);

  const showItemsIcon = document.createElement('span');
  showItemsIcon.classList.add('material-icons');
  showItemsIcon.innerText = 'list'
  showItems.appendChild(showItemsIcon);
  return showItems;
}

const ul = $('#tree');
// ul is an object. ul[0] is the tag itself.
var treeObject = @json($tree);
// @ json(laravelValue) -> turns laravel object to json object
drawTree(treeObject,ul[0]);
</script>

@endsection