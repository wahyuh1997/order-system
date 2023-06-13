<script>
  /* Trigger image */
  $(document).on('input', '.upd-image', function() {
    $(this).parent().find('.pic')
      .attr('src', window.URL.createObjectURL(this.files[0]))
      .addClass('img-thumbnail')
      .css({
        'height': '150px',
        'width': '100%',
        'display': 'block',
        'cursor': 'pointer'
      })
    $(this).parent().parent().children().find('.del-image').removeClass('d-none');
  });

  $(document).on('click', '.del-image', function(e) {
    e.preventDefault()
    let parent = $(this).parent()

    parent.find('.del-image').fadeIn();
    parent.find('.pic').removeAttr('src').removeClass('img-thumbnail').css('height', '0').fadeOut()
    parent.find('.upd-image').val('');
    parent.find('.del-image').addClass('d-none');
    parent.find('input').val(null);
  });
</script>