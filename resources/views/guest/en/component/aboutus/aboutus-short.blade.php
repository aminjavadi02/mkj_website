@if(!empty($aboutus['history_en']))
<div class="container aboutus-container">
    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="col wrapper" dir="rtl" id="history_en"></div>
                <div class="col button-container">
                    <a href="#" class="button"><span>About us</span></a>
                </div>
            </div>
        </div>
    </div>
</div>
<!--  -->

<script>
    window.onload = function () {
        var History_en = @json($aboutus['history_en']);
        $('#history_en')[0].innerHTML = History_en;
        
    }
</script>
@endif