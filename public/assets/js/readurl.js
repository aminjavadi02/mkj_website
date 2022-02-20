
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#selectedImg').attr('src', e.target.result);
            $('#selectedImg').show();
        }

        reader.readAsDataURL(input.files[0]);
    }
  }

  