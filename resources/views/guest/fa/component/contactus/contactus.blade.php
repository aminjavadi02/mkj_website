<!-- 
    1- form
    2- route to post for user
    3- get the info and show it in admin dashboard
 -->

 <div class="container">
     <div class="row">
         <div class="col-md-6">
             <!-- contact info -->
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
         <div class="col-md-6">
             <!-- form -->
             @include('inc.messages')
             <form action="{{route('contactus')}}" class="contactUsForm" method="post">
                <p class="title">
                    ارتباط با ما
                </p>
                 @csrf
                 <div class="form-group">
                    <label for="InputName">نام و نام خانوادگی</label>
                    <input type="text" class="form-control" id="InputName" name="name" placeholder="نام و نام خانوادگی" required value="{{old('name')}}">
                 </div>
                 <div class="form-group">
                    <label for="InputEmail1">آدرس ایمیل</label>
                    <input type="email" class="form-control" id="InputEmail1" name="email" placeholder="ایمیل" aria-describedby="emailHelp" value="{{old('email')}}">
                    <small id="emailHelp" class="form-text text-muted">ایمیل شما را به هیچ عنوان با کسی به اشتراک نخواهیم گذاشت</small>
                </div>
                <div class="form-group">
                    <label for="InputSubject">موضوع پیام</label>
                    <input type="text" class="form-control" id="InputSubject" name="subject" placeholder="موضوع" required value="{{old('subject')}}">
                </div>
                <div class="form-group">
                    <label for="InputText">متن پیام</label>
                    <textarea type="text" class="form-control text" id="InputText" name="text" placeholder="متن پیام" required value="{{old('text')}}"></textarea>
                </div>
                <div class="submit">
                    <button type="submit" class="btn btn-primary">ارسال</button>
                </div>
             </form>
         </div>
     </div>
 </div>