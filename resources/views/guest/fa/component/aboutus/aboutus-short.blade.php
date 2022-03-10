<div class="container aboutus-short">
    <div class="image"></div>
    <div class="history_fa-container">
        <div dir="rtl" id="history_fa"></div>
    </div>
    <div class="button-container">
        <a href="#" class="button"><span>درباره ی ما</span></a>
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