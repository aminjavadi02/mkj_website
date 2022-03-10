function deleteImage(){
    if(confirm('آیا از حذف این تصویر اطمینان دارید؟')){
      $("#currentImageDiv").remove();
      $("#deleteOrNot").val(true);
    }
  }