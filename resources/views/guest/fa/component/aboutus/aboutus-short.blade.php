<div class="container aboutus-short">
    <div class="aboutus-short-image"
    style="background-image: url({{asset('storage/images/aboutus/'.$aboutus->image_name)}});"></div>
    <div class="row aboutus-short-history_fa-container">
        <div class="col-sm-5 pull-right" id="history_fa"></div>
    </div>
    <div class="row">
        
    </div>
    <div class="row">
        <!-- cards -->
    </div>
</div>

<script>
    window.onload = function () {
        var History_fa = @json($aboutus['history_fa']);
        $('#history_fa')[0].innerHTML = History_fa;
        
    }
</script>