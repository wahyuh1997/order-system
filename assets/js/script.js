$('.phone').mask('(0000) 0000-0000');

  $('.order-toggle').bootstrapToggle();

  $('#regCrudForm').on('submit', function(e) {
    e.preventDefault();
    // init
    var url = $(this).attr('action');
    var redUrl = $(this).data('redurl');
    var form_data = new FormData($(this)[0]);
    Swal.fire({
      icon: 'warning',
      title: 'Konfirmasi',
      showCancelButton: true,
      confirmButtonText: `OK`,
      cancelButtonText: `Batal`,
      text: 'Pastikan Data Yang Anda Input Telah Sesuai',
    }).then((result) => {
      if (result.isConfirmed == false) {
        return false;
      } else if (result.isConfirmed == true) {
        $.ajax({
          type: 'POST',
          url: url,
          data: form_data,
          dataType: 'JSON',
          async: true,
          processData: false,
          contentType: false,
          beforeSend: function() {
            $('.bg-process').fadeIn();
          },
          success: function(textParse) {
            $('.bg-process').attr('style', 'display: none !important');

            if (textParse.status == true) {
              Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: textParse.message,
              }).then((result) => {
                if (result.isConfirmed) {
                  window.location.href = redUrl;
                }
              });
            } else {
              Swal.fire({
                icon: 'error',
                title: 'Gagal',
                text: textParse.message,
              })
            }
          }
        }).fail(function(jqXHR, ajaxOptions, thrownError) {
          $('.bg-process').attr('style', 'display: none !important');
          Swal.fire({
            icon: 'error',
            title: 'Failed',
            text: 'Server Not Responding',
          })
        });
      }
    })
  });