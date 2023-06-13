<script>
  $(document).on('keyup', 'input[name="no_telepon"]', function() {
    if ($(this).val().length > 14) {
      $('button').prop('disabled', false);
    } else {
      $('button').prop('disabled', true);
    }
  })
</script>