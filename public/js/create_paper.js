var loadFile = function(event) {
    $('#add-crop').append('<img id="crop" style="background-color:#b8b8b8; max-width: 100%;"/>');
    var output = document.getElementById('crop');
    output.src = URL.createObjectURL(event.target.files[0]);
    $('#image').hide();
    $('#delselect').show();
    var jcrop_api;

    $(function(){
        $('#crop').Jcrop({
            aspectRatio: 3.7/4,
            onSelect: updateCoords
        },function(){
            jcrop_api = this;
        });

        $('#delselect').click(function(e){
            jcrop_api.release();
            jcrop_api.destroy();
            $('#image').show();
            $('#delselect').hide();
            $('#crop').remove();
            return false;
        });

    });
};

function updateCoords(c)
{
    $('#x').val(c.x);
    $('#y').val(c.y);
    $('#w').val(c.w);
    $('#h').val(c.h);
};

$(document).ready(function () {

    $('#image').on('change', function (e) {

        loadFile(e);

    });

    $('#album').on('change', function () {

        $('#albumImages').append()
    })
});

function toLowerCase(string) {

    if(string === null)
    {
        return '';
    }
    return string.toLowerCase();
}