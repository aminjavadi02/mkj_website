@if($aboutus['history_en'])
<div class="aboutus">
    <div class="aboutus-img-container">
        <img src="{{asset('storage/images/aboutus/'.$aboutus->image_name)}}" class="bg">
    </div>
    <div class="container aboutus-big-container">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col title">
                        Company history
                    </div>
                </div>
                <div class="row">
                    <div class="col wrapper" dir="rtl" id="history_en"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="contactinfo-container">
        <div class="contactInfo EngFont">
            <p class="title">contact info</p>
            <label for="office_phone">office phone</label>
            <p id="office_phone">{{$aboutus['office_phone']}}</p>

            <label for="office_address">office address</label>
            <p id="office_address">{{$aboutus['office_address_en']}}</p>
            
            <label for="factory_phone">factory phone</label>
            <p id="factory_phone">{{$aboutus['factory_phone']}}</p>

            <label for="factory_address">factory address</label>
            <p id="factory_address">{{$aboutus['factory_address_en']}}</p>
        </div>
    </div>
</div>
<script>
    window.addEventListener('load', function(){
        var History_en = @json($aboutus['history_en']);
        $('#history_en')[0].innerHTML = History_en;
        
    })
</script>
@endif