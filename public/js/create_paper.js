var loadFile = function (event) {
    $('')
    $('#borders').removeClass('display-none');
    $('#add-crop').append('<img id="crop" style="background-color:#b8b8b8; max-width: 100%;"/>');
    var output = document.getElementById('crop');
    output.src = URL.createObjectURL(event.target.files[0]);
    $('#image').hide();
    $('#delselect').show();
    var jcrop_api;

    $(function () {
        $('#crop').Jcrop({
            aspectRatio: 3.7 / 4,
            onSelect: updateCoords
        }, function () {
            jcrop_api = this;
        });

        $('#delselect').click(function (e) {
            jcrop_api.release();
            jcrop_api.destroy();
            $('#image').show();
            $('#delselect').hide();
            $('#crop').remove();
            return false;
        });

    });
};

var loadFiles = function (e) {

    $('#albumImages').append('<img class="albumImage" style="background-color:#b8b8b8; max-width: 100%;"/>');
    var output = document.getElementById('crop');
    output.src = URL.createObjectURL(event.target.files[0]);
    $('#albumImage').hide();
    // $('#delselect').show();
};

function updateCoords(c) {

    var naturalWidth = document.getElementById('crop').naturalWidth;
    var naturalHeight = document.getElementById('crop').naturalHeight;
    var currentWidth = $('#crop').width();
    var currentHeight = $('#crop').height();

    var widthProportions = 1;
    var heightProportions = 1;

    if (naturalWidth > currentWidth) {

        widthProportions = naturalWidth / currentWidth ;
        heightProportions = naturalHeight / currentHeight;
    }

    // console.log('proportions: ' + proportions);
    console.log('naturalWidth: ' + widthProportions);
    console.log('currentWidth: ' + heightProportions);


    $('#x').val(c.x * widthProportions);
    $('#y').val(c.y * widthProportions);
    $('#w').val(c.w * widthProportions);
    $('#h').val(c.h * heightProportions);


};

$(document).ready(function () {

    $('#image').on('change', function (e) {

        loadFile(e);

    });


});

window.albumPreview = function (input) {

    $("#albumImages").empty();
    if (input.files && input.files[0]) {

        $(input.files).each(function () {

            var reader = new FileReader();
            reader.readAsDataURL(this);
            reader.onload = function (e) {

                $("#albumImages").append('<img class="img-thumbnail" style="max-height: 100px" src="' + e.target.result + '">');
            }
        });
    }

};
// function toLowerCase(string) {
//
//     if (string === null) {
//         return '';
//     }
//     return string.toLowerCase();
// }