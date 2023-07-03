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
</script>