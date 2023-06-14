<script>
  function actionButton(params) {
    $('input[name="type"]').val(params)

    $('#regCrudForm').attr('data-redurl', $(this).data('redurl'));
  }
</script>