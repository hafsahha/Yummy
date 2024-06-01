$(document).ready(function () {
    $('#member').hide();
    $('#membership').change(function() {
        $('#member').slideToggle();
        $('#non_member').slideToggle();
        
        if ($('#membership').is(':checked')) {
            $('#member select').prop('required', true);
            $('#non_member input').prop('required', false);
        } else {
            $('#member select').prop('required', false);
            $('#non_member input').prop('required', true);
        }
    });
    
    $.ajax({
        url: 'getLapangan.php?id=' + $('#ID_lapangan').val(),
        type: 'GET',
        datatype: 'json',
        success: function(response) {
            console.log(response);
            $('#form_image').css('background-image', 'url(assets/img/lapangan/' + response.gambar);
        }
    });
});