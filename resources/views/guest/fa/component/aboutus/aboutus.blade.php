@if($aboutus['history_fa'])
<div class="aboutus">
    <div class="aboutus-img-container">
        <img src="{{asset('assets/img/high-voltage-post-high-voltage-tower.jpg')}}" class="bg">
    </div>
    <div class="container aboutus-big-container">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col title">
                        تاریخچه ی شرکت
                    </div>
                </div>
                <div class="row">
                    <div class="col wrapper" dir="rtl" id="history_fa"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="contactinfo-container">
        <div class="contactInfo">
            <p class="title">اطلاعات تماس</p>
            <label for="office_phone">تلفن دفتر</label>
            <p id="office_phone">{{$aboutus['office_phone']}}</p>

            <label for="office_address">آدرس دفتر</label>
            <p id="office_address">{{$aboutus['office_address_fa']}}</p>
            
            <label for="factory_phone">تلفن کارخانه</label>
            <p id="factory_phone">{{$aboutus['factory_phone']}}</p>

            <label for="factory_address">آدرس کارخانه</label>
            <p id="factory_address">{{$aboutus['factory_address_fa']}}</p>
        </div>
    </div>
</div>
<script>
    window.onload = function () {
        var History_fa = @json($aboutus['history_fa']);
        $('#history_fa')[0].innerHTML = History_fa;
        
    }
</script>
@endif







@if($aboutus['office_phone'])

@endif
@if($aboutus['factory_phone'])

@endif
@if($aboutus['office_address_fa'])

@endif
@if($aboutus['factory_address_fa'])

@endif
@if($aboutus['image_name'])

@endif