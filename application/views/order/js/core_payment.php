<script>
  /* Trigger image */
  $(document).on('input', '.upd-image', function() {
    $(":file").jfilestyle('text', 'Ubah');
    $('button').prop('disabled', false);
  });
</script>