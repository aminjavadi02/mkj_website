@extends('layouts.app')
@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-11">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title">دسته بندی جدید</h4>
            <p class="card-category">دسته بندی جدید بسازید!</p>
          </div>
          <div class="card-body">
            <form method="post" action="{{url('/categories')}}" enctype="multipart/form-data">
            <!-- change to categories -->
              @csrf
              <div class="row">
                <div class="col-md-5">
                  <div class="form-group">
                    <label class="bmd-label-floating">نام دسته بندی به فارسی</label>
                    <input type="text" name="name_fa" class="form-control">
                  </div>
                </div>
                <br><br>

                <div class="col-md-5">
                  <div class="form-group">
                    <label class="bmd-label-floating">نام دسته بندی به انگلیسی</label>
                    <input type="text" name="name_en" class="form-control">
                  </div>
                </div>
              </div>
              <!--  -->
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>دسته بندی پدر</label>
                    <div class="form-group">
                      <!-- show all cats as ul li here -->
                      <ul id="tree"></ul>
                      <input type="text" id="parent_id_input" name="parent_id" hidden>
                    </div>
                  </div>
                </div>
              </div>
              <button type="submit" class="btn btn-primary pull-right">ثبت تغییرات</button>
            </form>
          </div>
        </div>
      </div>
      
    </div>
  </div>
</div>

<script src="{{asset('assets/js/core/jquery.min.js')}}"></script>
<script>
    var treeObject = @json($tree);
    // @ json(laravelValue) -> turns laravel object to json object
    function drawTree(treeObject, ul){
        // treeObject is an object. foreach works only on array. so i had to use for.
        for(branch in treeObject){
            const li = document.createElement('li');
            li.innerText = treeObject[branch]['name_fa'];
            li.value = treeObject[branch]['id'];
            li.style.cursor = 'pointer';
            // change the li style properties:
            // on hover -> cursor pointer,color different, 
            // on click -> change the color as selected or active
            li.onclick = function(e){
                e.stopPropagation();
                // stopPropagation() -> to stop the event bubling up the Dom and repeating itself
                $('#parent_id_input').val(li.value);
            };
            if(treeObject[branch].children.length > 0){
                // making the function recursive to cover all children
                var newUl = document.createElement('ul');
                li.appendChild(newUl);
                drawTree(treeObject[branch].children, newUl);
            }
            ul.appendChild(li);
        }
    }
    const ul = $('#tree');
    // ul is an object. ul[0] is the tag itself.
    drawTree(treeObject,ul[0]);
</script>

@endsection