<div class="sidebar" data-color="purple" data-background-color="black" data-image="../../../public/assets/img/sidebar-2.jpg">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
    <div class="logo"><a href="#" class="simple-text logo-normal">
          admin pannel
    </a></div>
    <div class="sidebar-wrapper">
        <ul class="nav">
          @if(Route::is('app'))
          <li class="nav-item active ">
          @else
          <li class="nav-item ">
          @endif
            <!-- if route == dashboard then add "active" to its class -->
            <a class="nav-link" href="{{route('app')}}">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>
          @if(Route::is('aboutus.edit'))
          <li class="nav-item active ">
          @else
          <li class="nav-item ">
          @endif
            <a class="nav-link" href="{{url('/aboutus/1/edit')}}">
              <i class="material-icons">content_paste</i>
              <p>about us</p>
            </a>
          </li>

          @if(Route::is('blogs.create'))
          <li class="nav-item active ">
          @else
          <li class="nav-item ">
          @endif
            <a class="nav-link" href="{{route('blogs.create')}}">
              <i class="material-icons">content_paste</i>
              <!-- change this to a better icon -->
              <p>create blog</p>
            </a>
          </li>

          @if(Route::is('blogs.index'))
          <li class="nav-item active ">
          @else
          <li class="nav-item ">
          @endif
            <a class="nav-link" href="{{url('blogs')}}">
              <!-- change 1 to blog_id -->
              <i class="material-icons">content_paste</i>
              <!-- change this to a better icon -->
              <p>all blogs</p>
            </a>
          </li>
        </ul>
    </div>
    </div>

