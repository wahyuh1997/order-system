<script>
  /* Trigger image */
  $(document).on('input', '.upd-image', function() {
    // $(":file").jfilestyle('text', 'Ubah');
    $('button').prop('disabled', false);

    $('.btn-submit').removeClass('d-none')
    $('.btn-wa').removeClass('btn-orange').addClass('btn-secondary')

  });
</script>