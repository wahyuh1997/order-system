<script>
  calc_total()

  $(document).on('click', '.btn-add', function() {
    let qty = $(this).parent().parent().find('.inp-qty').val();
    qty = parseInt(qty) + parseInt(1);
    $(this).parent().parent().find('.inp-qty').val(qty).trigger('change');
  });

  $(document).on('click', '.btn-minus', function() {
    let qty = $(this).parent().parent().find('.inp-qty').val();
    let menu_id = $(this).parent().parent().find('.inp-qty').data('id');
    qty = qty - 1;
    $(this).parent().parent().find('.inp-qty').val(qty).trigger('change')

    if (qty == 0) {
      let html = `<button class="btn btn-outline-orange btn-round align-self-end me-2 add-item" data-id="${menu_id}">Tambah</button>`;
      $(this).parent().parent().parent().html(html)
    }

  });

  $(document).on('change', '.inp-qty', function() {
    let qty = $(this).val();
    let menu_id = $(this).data('id');

    if (qty == 0) {
      add_to_cart('delete', menu_id, qty);
    } else {
      add_to_cart('update', menu_id, qty);
    }
  });

  $(document).on('click', '.btn-del', function() {
    let menu_id = $(this).data('id');
    Swal.fire({
      icon: 'question',
      title: 'Hapus Produk',
      showCancelButton: true,
      confirmButtonText: `Hapus Produk`,
      cancelButtonText: 'Batal',
      reverseButtons: true,
      text: 'Apakah anda yakin akan menghapus produk ini ?',
    }).then((result) => {
      // check if confirmed
      if (result.isConfirmed) {
        // do delete
        add_to_cart('delete', menu_id, 0);
        $(this).parent().parent().parent().parent().parent().parent().parent().remove()
      }
    });
  })



  function add_to_cart(status, menu_id, qty) {
    $.ajax({
      url: '<?= base_url() ?>' + 'menu/add_to_cart/' + status,
      method: 'POST',
      dataType: 'JSON',
      async: true,
      data: {
        menu_id: menu_id,
        item: qty
      },
      success: function(data) {
        calc_total()
      }
    })
  }

  function calc_total() {
    let total = 0
    $('.inp-qty').each(function() {
      total = parseInt(total) + ($(this).val() * $(this).data('price'));
    });

    $('.total-price').html('Rp. ' + numberWithCommas(total));

    if ($('.inp-qty').length == 0) {
      $('#btn-order').hide()
      $('.payment-detail').hide()
    }
  }
</script>