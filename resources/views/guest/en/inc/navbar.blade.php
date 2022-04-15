<nav class="navbar navbar-inverse navbar-expand-lg navbar-fixed-top userNavBar">
  <div class="container-fluid">
  
  <span class="material-icons navbar-toggler pull-right" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarToggler" style="color:gray; margin-top:2vh; cursor: pointer">menu</span>
  
    <div class="navbar-header">
      <a class="navbar-brand navbar-nav" href="{{route('index','en')}}">Mahan Keshesh Jam</a>
    </div>

    <div class="collapse navbar-collapse pull-right" id="navbarToggler">
    <ul class="nav navbar-nav ms-auto">
        <li><a href="{{route('latestItems','en')}}">Items</a></li>
        <li><a href="{{route('categories','en')}}">Categories</a></li>
        <li><a href="{{route('showManagers','en')}}">Managers</a></li>
        <li><a href="{{route('latestBlogs','en')}}">Blogs</a></li>
        <li><a href="{{route('showAboutus','en')}}">About us</a></li>
        <li><a href="#">catalogue</a></li>
        <li><a href="{{route('gallery','en')}}">Gallery</a></li>
    </ul>
  </div>
  </div>
</nav> 