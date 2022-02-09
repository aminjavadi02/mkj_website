
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

// var treeObject = @json($tree);
// @ json(laravelValue) -> turns laravel object to json object
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

        span.classList.add('caret');

        input.onclick = function(e){
            e.stopPropagation();
            // stopPropagation() -> to stop the event bubling up the Dom and repeating itself
            $('#parent_id_input').val(input.value);

            // to hide the ul and show selected li
            $('#tree').removeClass('active');
            $('#tree').addClass('nested');
            $('.tree').append(
                '<div class="btn btn-primary" id="editParentButton" onclick="openUl()">'+label.innerText+'</div>'
            );
        };

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
const ul = $('#tree');
// ul is an object. ul[0] is the tag itself.
drawTree(treeObject,ul[0]);

function openUl(){
    // to hide the selected li and show the ul
    $('#tree').removeClass('nested');
    $('#tree').addClass('active');
    $('#editParentButton').remove();
}