$(document).ready(function(){
    $('#show-image-select-cv').on('click', function(){
        $('#cover_image').click();
    });

    $('#cover_image').on('change', function(){
        var input = this;

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                // Update the src attribute of the image
                $('#show-image-select-cv').html('<img class="rounded" style="height: 300px;" src="' + e.target.result + '" alt="">');
            }

            reader.readAsDataURL(input.files[0]);
        }
    });
});

