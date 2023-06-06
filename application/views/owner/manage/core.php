<script>
  function toggle_all() {

    if ($('#order-toggle').prop('checked') == true) {
      $('.form-check-input').prop('checked', true)
      $('.card').addClass('active');
    } else {
      $('.form-check-input').prop('checked', false)
      $('.card').removeClass('active');
    }
  }

  function toggle_order(length) {
    if (length == 1) {
      $('.form-check-input').prop('checked', true)
      $('.card').addClass('active');
    }

    if (length == 0) {
      $('.form-check-input').prop('checked', false)
      $('.card').removeClass('active');
    }


  }

  $(document).on('click', '.form-check-input', function() {
    if ($('.card.active').length == 0) {
      $('.order-toggle').bootstrapToggle('destroy')
      $('.order-toggle').bootstrapToggle('on', true)
    }

    if ($(this).prop('checked') == true) {
      $(this).parent().parent().parent().parent().parent().parent().parent().addClass('active');
    } else {
      $(this).parent().parent().parent().parent().parent().parent().parent().removeClass('active');
    }

    if ($('.card.active').length == 0) {
      $('.order-toggle').bootstrapToggle('off')
    }



  });
</script>