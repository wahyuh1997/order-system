<script>
  /* Trigger image */
  $(document).on('input', '.upd-image', function() {
    // $(":file").jfilestyle('text', 'Ubah');
    $('button').prop('disabled', false);

    $('.btn-submit').removeClass('d-none')
    $('.btn-wa').removeClass('btn-orange').addClass('btn-secondary')

  });

  $(document).on('click', '.img-trf', function() {
    let img = $(this).attr('src');
    $('#exampleModal .modal-body').html(`<img src="${img}" style="width: 100%;">`)
    $('#exampleModal').modal('show');
  });

  $(document).on('click', '#btn-submit-order', function(e) {

    $('input[name="type"]').val('payment');
    $(this).trigger('submit');
  });

  $(document).on('click', '#btn-cancel-order', function(e) {
    e.preventDefault();
    // init
    var url = $(this).attr('href');
    var redUrl = $(this).data('redurl');
    // confirmation
    Swal.fire({
      icon: 'question',
      title: 'Apakah anda yakin',
      showCancelButton: true,
      confirmButtonText: `Ya`,
      cancelButtonText: 'Batal',
      reverseButtons: true,
      text: 'akan membatalkan pesanan ini ?',
    }).then((result) => {
      // check if confirmed
      if (result.isConfirmed) {
        // do delete
        $.get(url, function(response) {
          // parsing the json
          let textParse = JSON.parse(response);

          // check status of response
          if (textParse.status == true) {
            Swal.fire({
              icon: 'success',
              title: "Success",
              confirmButtonText: `OK`,
              text: 'Anda membatalkan pesanan ini !',
            }).then((result) => {
              if (result.isConfirmed) {
                window.location.href = redUrl;
              }
            });
          } else {
            Swal.fire({
              icon: 'error',
              title: "{{Failed}}",
              text: textParse.message,
            })
          }
        });
      }
    });
  });
</script>