<script>
  function actionButton(params) {
    $('input[name="type"]').val(params)
  }

  $(document).on('click', 'button[name="confirm"]', function() {
    $('#regCrudForm').attr('data-redurl', '<?= base_url('owner/order/index/process'); ?>').removeAttr('data-text').attr('data-text', 'Anda yakin ingin konfirmasi pesanan ini ?');
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
</script>