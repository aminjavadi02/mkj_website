<!-- 
    1- form
    2- route to post for user
    3- get the info and show it in admin dashboard
 -->

 <div class="container">
     <div class="row">
         <div class="col-md-6">
             <!-- contact info -->
            <div class="contactInfo contactEnglish">
                <p class="title">contact info</p>
                <label for="office_phone">office phone</label>
                <p id="office_phone">{{$aboutus['office_phone']}}</p>

                <label for="office_address">office address</label>
                <p id="office_address">{{$aboutus['office_address_en']}}</p>
                
                <label for="factory_phone">facory phone</label>
                <p id="factory_phone">{{$aboutus['factory_phone']}}</p>

                <label for="factory_address">facory address</label>
                <p id="factory_address">{{$aboutus['factory_address_en']}}</p>
            </div>
         </div>
         <div class="col-md-6">
             <!-- form -->
             @include('inc.messages')
             <form action="{{route('contactus')}}" class="contactUsForm contactEnglish" method="post">
                <p class="title">
                    contact us
                </p>
                 @csrf
                 <div class="form-group">
                    <label for="InputName">name</label>
                    <input type="text" class="form-control" id="InputName" name="name" placeholder="write your name" required value="{{old('name')}}">
                 </div>
                 <div class="form-group">
                    <label for="InputEmail1">email</label>
                    <input type="email" class="form-control" id="InputEmail1" name="email" placeholder="email@example.com" aria-describedby="emailHelp" value="{{old('email')}}">
                    <small id="emailHelp" class="form-text text-muted">we will never share your email with others</small>
                </div>
                <div class="form-group">
                    <label for="InputSubject">subject</label>
                    <input type="text" class="form-control" id="InputSubject" name="subject" placeholder="subject..." required value="{{old('subject')}}">
                </div>
                <div class="form-group">
                    <label for="InputText">message</label>
                    <textarea type="text" class="form-control text" id="InputText" name="text" placeholder="write your message" required value="{{old('text')}}"></textarea>
                </div>
                <div class="submit">
                    <button type="submit" class="button5">send</button>
                </div>
             </form>
         </div>
     </div>
 </div>