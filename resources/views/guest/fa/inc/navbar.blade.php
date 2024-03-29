@if(Route::is('index'))
<nav class="navbar navbar-expand-lg navbar-fixed-top userNavBar" id="userNavBar">
@else
<nav class="navbar navbar-expand-lg navbar-fixed-top userNavBar notindex" id="userNavBar">
@endif

  <div class="container-fluid">
  
  <span class="material-icons navbar-toggler pull-right menu-icon" onclick="expand(this.parentElement.parentElement)" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarToggler">menu</span>
  
    <div class="navbar-header">
      <a class="navbar-brand navbar-nav" href="{{route('index')}}">
        <img src="{{asset('assets/img/logo.png')}}" alt="logo" class="navbarlogo">
      </a>
    </div>

    <div class="collapse navbar-collapse pull-right" id="navbarToggler">
    <ul class="nav navbar-nav ms-auto NavLinkList heading5">
      <li><a href="{{route('latestItems','fa')}}">محصولات</a></li>
      <li><a href="{{route('categories','fa')}}">دسته بندی ها</a></li>
      <li><a href="{{route('showManagers','fa')}}">هیات مدیره</a></li>
      <li><a href="{{route('latestBlogs','fa')}}">بلاگ ها</a></li>
      <li><a href="{{route('showAboutus','fa')}}">درباره ما</a></li>
      <li><a href="#">کاتالوگ</a></li>
      <li><a href="{{route('gallery','fa')}}">گالری</a></li>
      @if(substr(URL::current(),-2) == 'fa')
      <li><a href="{{substr(URL::current(),0,-3).'/en'}}"><span class="material-icons">translate</span></a></li>
      @else
      <li><a href="{{URL::current().'/en'}}"><span class="material-icons">translate</span></a></li>
      @endif
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