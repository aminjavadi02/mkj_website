<div class="container footer">
    <div class="row">
    <div class="col middle">
        <a onclick="topfunction()" class="button-3" id="goTopBtn"><span class="material-icons">arrow_upward</span></a>
    </div>
    </div>
    <div class="row">
        <div class="col-md-6 left-side">
            <a href="{{route('index')}}" class="homepagelink">
                شرکت ماهان کشش جم
            </a>
        </div>
        <div class="col-md-6 rightside">
            <ul class="dp-flex flex-column">
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