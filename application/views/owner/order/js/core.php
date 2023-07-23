<script>
  function actionButton(params) {
    $('input[name="type"]').val(params)
  }

  $(document).on('click', '#btn-confirm', function() {
    $('#regCrudForm').attr('data-redurl', '<?= base_url('owner/order/index/process'); ?>').removeAttr('data-text').attr('data-text', $(this).data('text'));
  });
  $(document).on('click', '#btn-finish', function() {
    $('#regCrudForm').attr('data-redurl', '<?= base_url('owner/order/index/history'); ?>').removeAttr('data-text').attr('data-text', $(this).data('text'));
  });
  $(document).on('click', '#btn-cancel', function() {
    $('#regCrudForm').attr('data-redurl', '<?= base_url('owner/order/index/history'); ?>').removeAttr('data-text').attr('data-text', $(this).data('text'));
  });
  $(document).on('click', 'button[name="cancel"]', function() {
    $('#regCrudForm').attr('data-redurl', '<?= base_url('owner/order/index/history'); ?>').removeAttr('data-text').attr('data-text', 'Anda yakin ingin membatalkan pesanan ini ?');
  });

  $(document).on('click', '#btn-cancel-order', function() {
    $('#confirm-section').addClass('d-none');

    $('#view-desc-cancel').show();
    $('#cancel-section').removeClass('d-none');
  });

  $(document).on('keyup', '#desc', function() {
    if ($(this).val() != '') {
      $('#btn-cancel').prop('disabled', false)
    } else {
      $('#btn-cancel').prop('disabled', true)
    }
  })

  $(document).on('click', '.img-payment', function() {
    let img = $(this).attr('src')

    $('#exampleModal .modal-body').html(`<img src="${img}" class="img-thumbnail" style="width: 100%;">`);
    $('#exampleModal').modal('show');
  })
</script>