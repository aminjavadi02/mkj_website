<div class="form-group tree">
    <!-- show all cats as ul li here -->
    <ul id="tree" class="category_ul"></ul>
    <input type="text" id="parent_id_input" value="{{$category->parent_id}}" name="parent_id" hidden>
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
var treeObject = @json($tree);
var $cat = @json($category);
// @ json(laravelValue) -> turns laravel object to json object
function drawTree(treeObject, ul){
    // treeObject is an object. foreach works only on array. so i had to use for.
    for(branch in treeObject){
        // if this is not the object itself, show it as selectable parent
        if(treeObject[branch]['id'] != $cat['id']){
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

            // label is to show the parent name on the inputs
            label.setAttribute('for',treeObject[branch]['id']);
            label.innerText = treeObject[branch]['name_fa'];
            label.style.cursor = 'pointer';
            label.classList.add('category_input');

            // in order to do "display flex", i put them in a div
            div.appendChild(input);
            div.appendChild(label);
            div.classList.add('inputAndLabel');

            // give the whole div as child to li to keep showing tree ul/li style
            li.appendChild(div);
            li.classList.add('category_li');

            // caret class is just to draw a triangle
            span.classList.add('caret');

            // if it has children, do the same to them
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

            // when an input is selected to be parent(by clicking on it), do this...
            input.onclick = function(e){
                e.stopPropagation();
                // stopPropagation() -> to stop the event bubling up the Dom and repeating itself
                $('#parent_id_input').val(input.value);

                // hide the ul and show selected li
                $('#tree').removeClass('active');
                $('#tree').addClass('nested');
                $('.tree').append(
                    '<div class="btn btn-primary" id="editParentButton" onclick="openUl()">'+label.innerText+'</div>'
                );
            };

            // ul is the written ul in html on line 3. append this whole shit to it to show in page
            ul.appendChild(li);
        }
    }
}
const ul = $('#tree');
// ul is an object. ul[0] is the tag itself.
drawTree(treeObject,ul[0]);

function openUl(){
    // to hide the selected li and show the ul
    // by clicking on triangle button
    $('#tree').removeClass('nested');
    $('#tree').addClass('active');
    $('#editParentButton').remove();
}
</script>