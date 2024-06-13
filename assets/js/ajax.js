$(document).ready(function () {
    function calculateTimeDifference(startTime, endTime) {
        // Convert the time strings to Date objects
        var start = new Date('1970-01-01T' + startTime + 'Z');
        var end = new Date('1970-01-01T' + endTime + 'Z');

        if (start > end) {
            // Set the end time equal to the start time
            end = start;
        }

        // Calculate the difference in milliseconds
        var diff = end - start;

        // Convert the difference to hours and minutes
        var hours = Math.ceil(diff / 1000 / 60 / 60);

        return hours;
    }

    function handleTimeChange() {
        var startTime = $('#waktu_mulai').val();
        var endTime = $('#waktu_selesai').val();
        return calculateTimeDifference(startTime, endTime);
    }

    $('#member').hide();
    $('#fasilitaz').hide();
    $('#total').hide();
    $('#extra').hide();
    $('#duration').hide();
    $('#discount').hide();
    $('#pricetotal').hide();

    var fieldprice = 0;
    var extras = 0;
    var duration = 0;
    var total = 0;
    
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
            $('#discount').slideUp();
        }
    });

    $('#fasilitas').change(function() {
        $('#fasilitaz').slideToggle();
        
        if ($('#fasilitas').is(':checked')) {
            $('#ID_fasilitas').prop('required', true);
        } else {
            $('#ID_fasilitas').prop('required', false);
            $('#ID_fasilitas').val('');
            $('#extra').slideUp();
            extras = 0;
        }
    });
    
    $('#member select').change(function() {
        $('#discount').slideDown();
        $('#discount b').html('- Rp20000/jam');
    });
    
    $('#ID_lapangan').change(function() {
        $('#total').slideDown();
        var ID = $('#ID_lapangan').val();
        $.ajax({
            url: 'getLapangan.php?id=' + ID,
            type: 'GET',
            datatype: 'json',
            data: {ID: ID},
            success: function(response) {
                fieldprice = parseInt(response[0].harga);
                $('#form_image').css('background-image', 'url(assets/img/lapangan/' + response[0].gambar + ')');
                $('#field_price b').html('Rp' + response[0].harga + '/jam');

                if (duration <= 0) {
                    total = 0;
                } else if (!$('#member select').val()) {
                    total = (fieldprice + extras) * duration;
                } else {
                    total = (fieldprice + extras - 20000) * duration;
                }
                if (fieldprice && duration) {
                    $('#pricetotal b').html('Rp' + total);
                }
            }
        });
    });
    
    $('#fasilitaz').change(function() {
        $('#extra').slideDown();
        var ID = $('#ID_fasilitas').val();
        $.ajax({
            url: 'getFasilitas.php?id=' + ID,
            type: 'GET',
            datatype: 'json',
            data: {ID: ID},
            success: function(response) {
                extras = parseInt(response[0].harga);
                $('#field_extra b').html('Rp' + extras + '/jam');
                
                if (duration <= 0) {
                    total = 0;
                } else if (!$('#member select').val()) {
                    total = (fieldprice + extras) * duration;
                } else {
                    total = (fieldprice + extras - 20000) * duration;
                }
                if (fieldprice && duration) {
                    $('#pricetotal b').html('Rp' + total);
                }
            }
        });
    });
    
    $('#waktu_mulai, #waktu_selesai').change( function () {
        var waktuMulai = $('#waktu_mulai').val();
        var waktuSelesai = $('#waktu_selesai').val();

        if (waktuMulai && waktuSelesai) {
            $('#duration').slideDown();
            duration = handleTimeChange();
            if (duration) {
                $('#field_duration b').html(duration + ' jam');
            } else {
                $('#field_duration b').html('invalid');
                $('#pricetotal').slideUp();

            }
        }
    });
    
    $('#membership, #fasilitas, #member select, #ID_lapangan, #fasilitaz, #waktu_mulai, #waktu_selesai').change( function () {
        if (!$('#member select').val()) {
            total = (fieldprice + extras) * duration;
        } else {
            total = (fieldprice + extras - 20000) * duration;
        }

        if (fieldprice && duration) {
            $('#pricetotal').slideDown();
            $('#pricetotal b').html('Rp' + total);
        }
    });

    $(document).on('click', '.remove-fasilitas', function() {
        $(this).closest('.fasilitas-ekstra-container').slideUp(function() {
            $(this).remove();
        });
    });

    $('#fasilitas').change(function() {
        if (!this.checked) {
            $('#fasilitas_container').slideUp(function() {
                $(this).empty().show();
            });
        }
    });
});