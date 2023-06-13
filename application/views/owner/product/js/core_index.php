<script>
  $(document).on('keyup', '#search', function() {
    let search = $(this).val();

    $.ajax({
      url: 'product/search/' + search,
      method: 'GET',
      // dataType: 'JSON',
      async: true,
      success: function(data) {
        let res = JSON.parse(data);
        // console.log(res);
        if (res.status == true) {
          $('.container section').html(res.html);
        }
      }
    })

  })
</script>