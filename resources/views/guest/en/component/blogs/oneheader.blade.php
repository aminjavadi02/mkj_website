@if($blog->image_name)
<div style="background-image:url('{{asset('storage/images/blog/'.$blog->image_name)}}'); background-repeat:no-repeat; background-size: cover; height: 70vh">
@else
<div style="background-image:url('{{asset('storage/images/blog/default.jpg')}}'); height: 70vh; ">
@endif
<h2 class="CompanyName" style="color:yellowgreen">{{$blog->title}}</h2>
<!-- gallery comes up in this -->
<!-- background: image -->
</div>
