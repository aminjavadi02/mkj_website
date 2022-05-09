<div class="footer EngFooter">
    <div class="arrow">
        <div class="arrow">
                <a onclick="topfunction()" class="button-3" id="goTopBtn"><span class="material-icons">arrow_upward</span></a>
        </div>
    </div>
    <div class="right-side">
        <div class="list-title">
            <p class="EngFont">
                website pages
            </p>
        </div>
        <div class="list">
            <ul class="dp-flex flex-column EngFont">
                <li><a href="{{route('latestItems','en')}}">Items</a></li>
                <li><a href="{{route('categories','en')}}">Categories</a></li>
                <li><a href="{{route('showManagers','en')}}">Mangers</a></li>
                <li><a href="{{route('latestBlogs','en')}}">Blogs</a></li>
                <li><a href="{{route('showAboutus','en')}}">About Us</a></li>
                <li><a href="#">Catalogue</a></li>
                <li><a href="{{route('gallery','en')}}">Gallery</a></li>
            </ul>
        </div>
    </div>
    <div class="middle">
        <div class="list-title">
            <p class="EngFont">
                related links
            </p>
        </div>
        <div class="list">
            <ul class="dp-flex flex-column EngFont">
                <li><a href="{{route('latestItems','en')}}">Items</a></li>
                <li><a href="{{route('categories','en')}}">Categories</a></li>
                <li><a href="{{route('showManagers','en')}}">Mangers</a></li>
                <li><a href="{{route('latestBlogs','en')}}">Blogs</a></li>
                <li><a href="{{route('showAboutus','en')}}">About Us</a></li>
                <li><a href="#">Catalogue</a></li>
                <li><a href="{{route('gallery','en')}}">Gallery</a></li>
            </ul>
        </div>
    </div>
    <div class="left-side">
        <div class="list-title">
            <p class="EngFont">
                our  location
            </p>
        </div>
        <div class="location_fa">
            <div class="link">
                <iframe class="link" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6549.403130561293!2d51.012246623466375!3d34.838595277468755!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3f93ca01ec1bfcab%3A0xc5eaeeed2f719a92!2zU2FmYXLEgWLEgWQsIFFvbSBQcm92aW5jZSwgSXJhbg!5e0!3m2!1sen!2s!4v1651099878533!5m2!1sen!2s" width="350" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
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