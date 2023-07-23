<script>
  $(document).on('pointerdown', '.btn-select', function(e) {
    $('.button-select').fadeOut()
    $('.checked-view').toggleClass('d-none')
    if ($('.checked-view').hasClass('d-none') == true) {
      $('.form-check-input').prop('checked', false);
      $('.button-area').fadeOut();
    } else {
      $(this).parent().parent().find('.form-check-input').trigger('click')
      $('.button-area').fadeIn();
    }
  });

  $(document).on('pointerdown', '.btn-tutup', function(e) {
    $(this).parent().parent().find('.form-check-input').trigger('click')
    $('.button-area').fadeOut();
    $('.checked-view').toggleClass('d-none')
    $('.button-select').fadeIn()
  });

  $(document).on('click', '.btn-delete', function() {
    Swal.fire({
      icon: 'question',
      title: 'Hapus Pesanan',
      showCancelButton: true,
      confirmButtonText: `Hapus Pesanan`,
      cancelButtonText: 'Batal',
      reverseButtons: true,
      text: 'Apakah anda yakin akan menghapus pesanan ini ?',
    }).then((result) => {
      // check if confirmed
      if (result.isConfirmed) {
        var seq = 0;
        $('.form-check-input').each(function() {
          if ($(this).prop('checked') == true) {
            delete_order($(this).attr('data-id'));
          }
        })
        window.location.href = '<?= base_url('owner/order/index/history') ?>'
      }
    });
  });

  $(document).on('click', '#nav-complete-tab', function() {
    $('.btn-group-area').show()
  })
  $(document).on('click', '#nav-order-tab', function() {
    $('.btn-group-area').hide()
  })
  $(document).on('click', '#nav-new-tab', function() {
    $('.btn-group-area').hide()
  })

  function delete_order(id) {
    $.ajax({
      url: '<?= base_url('owner/order/delete/') ?>' + id,
      method: 'GET',
      dataType: 'JSON',
      async: true,
      success: function(res) {
        console.log(res);
      }
    })
  }
</script>