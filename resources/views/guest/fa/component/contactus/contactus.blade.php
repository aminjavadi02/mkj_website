<!-- 
    1- form
    2- route to post for user
    3- get the info and show it in admin dashboard
 -->

 <div class="container">
     <div class="row">
         <div class="col-md-6">
             <!-- picture -->
         </div>
         <div class="col-md-6">
             <!-- form -->
             ارتباط با ما
             <form action="" class="contactUsForm" method="post">
                 <input type="text" name="name" placeholder="نام و نام خانوادگی" required>
                 <div class="form-group">
                    <label for="InputEmail1">آدرس ایمیل</label>
                    <input type="email" class="form-control" id="InputEmail1" name="email" placeholder="ایمیل" aria-describedby="emailHelp">
                    <small id="emailHelp" class="form-text text-muted">ایمیل شما را به هیچ عنوان با کسی به اشتراک نخواهیم گذاشت</small>
                </div>
                <div class="form-group">
                    <label for="InputSubject">موضوع پیام</label>
                    <input type="text" class="form-control" id="InputSubject" name="subject" placeholder="موضوع" required>
                </div>
                <div class="form-group">
                    <label for="InputText">متن پیام</label>
                    <input type="text" class="form-control" id="InputText" name="text" placeholder="متن پیام" required>
                </div>
                <button type="submit" class="btn btn-primary">ارسال</button>
             </form>
         </div>
     </div>
 </div>