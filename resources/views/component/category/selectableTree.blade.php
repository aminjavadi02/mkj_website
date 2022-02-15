<script src="{{asset('assets/js/core/jquery.min.js')}}"></script>
<script>

function drawTree(treeObject, ul, inputName){
    // treeObject is an object. foreach works only on array. so i had to use for.
    for(branch in treeObject){
        const li = document.createElement('li');
        const span = document.createElement('span');
        const div = document.createElement('div');
        const input = document.createElement('input');
        const label = document.createElement('label');

        // input is the radio buttons to select parent
        input.setAttribute('type', 'radio');
        input.setAttribute('name',inputName);
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
            $('#needed_input').val(input.value);

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


</script>