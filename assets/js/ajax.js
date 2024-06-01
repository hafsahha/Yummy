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
    
    $('#form_image').css('background-image', 'url(assets/img/events-2.jpg)');
    $.ajax({
        url: 'getLapangan.php?id=' + $('#ID_lapangan').val(),
        type: 'GET',
        datatype: 'json',
        success: function(response) {
            console.log(response);
        }
    });
    
    $('#provinsi').change(function() {
        var id_provinsi = $('#provinsi').val();
        $('#form_kabupaten').slideDown();
        $('#kota').empty();
        $('#kota').append('<option value="" selected disabled hidden>Pilih</option>');
        $.ajax({
            url: 'kabupaten.php?id=' + id_provinsi,
            type: 'GET',
            datatype: 'json',
            data: {id_provinsi: id_provinsi},
            success: function(response) {
                console.log(response);
                for (let i = 0; i < response.length; i++) {
                    $('#kota').append('<option value="' + response[i].id + '">' + response[i].name + '</option>');
                }
            }
        });
    });

    $('#kota').change(function() {
        $('#form_kecamatan').slideDown();
        $('#form_kelurahan').slideDown();
    });
});