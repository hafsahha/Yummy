$(document).ready(function () {
    function calculateTimeDifference(startTime, endTime) {
        // Convert the time strings to Date objects
        var start = new Date('1970-01-01T' + startTime + 'Z');
        var end = new Date('1970-01-01T' + endTime + 'Z');

        if (start > end) {
            // Atur nilai waktu selesai sama dengan waktu mulai
            $('#waktu_selesai').val($(this).val());
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

    $('#fasilitas').change(function() {
        $('#fasilitaz').slideToggle();
        
        if ($('#fasilitas').is(':checked')) {
            $('#fasilitaz').prop('required', true);
        } else {
            $('#fasilitaz').prop('required', false);
            $('#fasilitaz').val('');
            $('#extra').slideUp();
        }
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
                $('#form_image').css('background-image', 'url(assets/img/lapangan/' + response[0].gambar + ')');
                $('#field_price b').html('Rp' + response[0].harga + '/jam');
            }
        });
    });
    
    $('#fasilitaz').change(function() {
        $('#extra').slideDown();
        var ID = $('#fasilitas_ekstra').val();
        $.ajax({
            url: 'getFasilitas.php?id=' + ID,
            type: 'GET',
            datatype: 'json',
            data: {ID: ID},
            success: function(response) {
                $('#field_extra b').html('Rp' + response[0].harga + '/jam');
            }
        });
    });
    
    $('#waktu_mulai, #waktu_selesai').change( function () {
        var waktuMulai = $('#waktu_mulai').val();
        var waktuSelesai = $('#waktu_selesai').val();

        if (waktuMulai && waktuSelesai) {
            $('#duration').slideDown();
            $('#field_duration b').html(handleTimeChange() + ' jam');
        }
    });

    $('#add_fasilitas').click(function() {
        var fasilitasSelect = `
            <div class="d-flex fasilitas-ekstra-container">
                <select class="form-select fasilitas-ekstra" aria-label="Category" name="fasilitas_ekstra[]">
                    <option value="" selected disabled hidden>Pilih</option>
                    <?php
                    foreach($fasilitas as $fasilitas){
                        echo '<option value="'.$fasilitas['ID'].'">'.$fasilitas['nama_fasilitas'].'</option>';
                    }
                    ?>
                </select>
                <button type="button" class="btn btn-danger btn-del-fasil remove-fasilitas">-</button>
            </div>
        `;
        var $fasilitasContainer = $(fasilitasSelect).hide();
        $('#fasilitas_container').append($fasilitasContainer);
        $fasilitasContainer.slideDown();
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