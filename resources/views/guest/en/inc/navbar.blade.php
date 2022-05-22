@if(Route::is('index'))
<nav class="navbar navbar-expand-lg navbar-fixed-top userNavBar userNavBarEn" id="userNavBar">
@else
<nav class="navbar navbar-expand-lg navbar-fixed-top userNavBar userNavBarEn notindex" id="userNavBar">
@endif

  <div class="container-fluid">
  
  <span class="material-icons navbar-toggler pull-right menu-icon" onclick="expand(this.parentElement.parentElement)" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarToggler">menu</span>
  
    <div class="navbar-header">
      <a class="navbar-brand navbar-nav" href="{{route('index','en')}}">
      <img src="{{asset('assets/img/logo.png')}}" alt="logo" class="navbarlogo">
      </a>
    </div>

    <div class="collapse navbar-collapse pull-right" id="navbarToggler">
    <ul class="nav navbar-nav ms-auto NavLinkList heading5">
      <li><a href="{{route('latestItems','en')}}">Items</a></li>
      <li><a href="{{route('categories','en')}}">Categories</a></li>
      <li><a href="{{route('showManagers','en')}}">Managers</a></li>
      <li><a href="{{route('latestBlogs','en')}}">Blogs</a></li>
      <li><a href="{{route('showAboutus','en')}}">About us</a></li>
      <li><a href="#">catalogue</a></li>
      <li><a href="{{route('gallery','en')}}">Gallery</a></li>
      <li><a href="{{substr(URL::current(),0,-3)}}"><span class="material-icons">translate</span></a></li>
      
    </ul>
  </div>
  </div>
</nav>
<script>
  window.onscroll = function() {NavBarBg()};

  function NavBarBg() {
    if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
      document.getElementById("userNavBar").classList.add("navBg");
    } else {
      document.getElementById("userNavBar").classList.remove("navBg");
    }
    if (document.body.scrollTop > 500 || document.documentElement.scrollTop > 500) {
      document.getElementById("userNavBar").classList.add("navBgBlack");
    } else {
      document.getElementById("userNavBar").classList.remove("navBgBlack");
    }
  }
  function expand(nav) {
    nav.classList.add('navBgBlack')
  }
</script>