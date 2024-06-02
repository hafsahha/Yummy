$(document).ready(function () {
    $('#member').hide();
    $('#membership').change(function() {
        $('#member').slideToggle();
        $('#non_member').slideToggle();
        
        if ($('#membership').is(':checked')) {
            $('#member select').prop('required', true);
            $('#non_member input').prop('required', false);
            $('#non_member input').val('');
        } else {
            $('#non_member input').prop('required', true);
            $('#member select').prop('required', false);
            $('#member select').val('');
        }
    });
    
    $('#ID_lapangan').change(function() {
        var ID = $('#ID_lapangan').val();
        $.ajax({
            url: 'getLapangan.php?id=' + ID,
            type: 'GET',
            datatype: 'json',
            data: {ID: ID},
            success: function(response) {
                $('#form_image').css('background-image', 'url(assets/img/lapangan/' + response[0].gambar + ')').fadeOut(1).fadeIn(1);
            }
        });
    });
});