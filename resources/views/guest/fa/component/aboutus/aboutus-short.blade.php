@if(!empty($aboutus['history_fa']))
<div class="container aboutus-container">
    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="col wrapper" dir="rtl" id="history_fa"></div>
                <div class="col button-container">
                    <a href="{{route('showAboutus','fa')}}" class="button"><span>درباره ی ما</span></a>
                </div>
            </div>
        </div>
    </div>
</div>
<!--  -->

<script>
    window.addEventListener('load', function(){
        var History_fa = @json($aboutus['history_fa']);
        $('#history_fa')[0].innerHTML = History_fa;
    })
</script>
@endif