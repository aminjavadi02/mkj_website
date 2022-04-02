<nav class="navbar navbar-inverse navbar-expand-lg navbar-fixed-top">
  <div class="container-fluid">
  
  <span class="material-icons navbar-toggler pull-right" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarToggler" style="color:gray; margin-top:2vh; cursor: pointer">menu</span>
  
    <div class="navbar-header">
      <a class="navbar-brand navbar-nav" href="{{route('index')}}">Mahan Keshesh Jam</a>
    </div>

    <div class="collapse navbar-collapse pull-right" id="navbarToggler">
    <ul class="nav navbar-nav ms-auto">
        <!-- add active class under rout is condition -->
        <!-- add routes -->
        <!-- make responsive -->
      <li><a href="{{route('latestItems','fa')}}">محصولات</a></li>
      <li><a href="{{route('categories','fa')}}">دسته بندی ها</a></li>
      <li><a href="{{route('showManagers','fa')}}">هیات مدیره</a></li>
      <li><a href="{{route('latestBlogs','fa')}}">بلاگ ها</a></li>
      <li><a href="{{route('showAboutus','fa')}}">درباره ما</a></li>
      <li><a href="#">کاتالوگ</a></li>
      <li><a href="{{route('gallery','fa')}}">گالری</a></li>
    </ul>
  </div>
  </div>
</nav> 