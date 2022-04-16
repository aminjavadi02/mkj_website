<div class="container footer EnglishFooter">
    <div class="row">
    <div class="col middle">
    <a onclick="topfunction()" class="button-3" id="goTopBtn"><span class="material-icons">arrow_upward</span></a>
    </div>
    </div>
    <div class="row">
        <div class="col-md-6 left-side">
            <a href="{{route('index','en')}}" class="homepagelink">
                Mahan keshesh Jam
            </a>
        </div>
        <div class="col-md-6 rightside">
            <ul class="dp-flex flex-column">
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
    <div class="row">
        <div class="designer">
        <p>DESIGNED BY <a href="mailto:aminjavadi02@gmail.com">Amin Javadi</a></p>
        </div>
    </div>
</div>

<script>
    mybutton = document.getElementById("goTopBtn");
    function topfunction(){
        console.log("Top function")
        document.body.scrollTop = 0; // For Safari
        document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
    }
</script>