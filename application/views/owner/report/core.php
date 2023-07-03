<script>
  /* Daterange */
  $('.daterange').daterangepicker({
    opens: 'left',
    locale: {
      format: 'YYYY-MM-DD'
    },
    startDate: $(this).data('start-date'),
    endDate: $(this).data('end-date')
  }, function(start, end, label) {
    $('#start_date').val(start.format('YYYY-MM-DD'))
    $('#end_date').val(end.format('YYYY-MM-DD'))
  });

  $(document).on('click', '.applyBtn', function() {
    $.ajax({
      url: 'report/get_report',
      method: 'POST',
      async: true,
      dataType: 'JSON',
      data: {
        start_date: $('#start_date').val(),
        end_date: $('#end_date').val(),
      },
      success: function(res) {
        if (res.status == true) {
          $('#total-income').html('Rp. ' + numberWithCommas(res.total_income));
          $('#order-cancel').html('Rp. ' + numberWithCommas(res.order_cancel));
          $('#order-success').html('Rp. ' + numberWithCommas(res.order_success));
          $('#total-product').html('Rp. ' + numberWithCommas(res.total_product));

          $('#load-view').html(res.html)
        } else {
          $('#total-income').html('Rp. 0');
          $('#order-cancel').html('Rp. 0');
          $('#order-success').html('Rp. 0');
          $('#total-product').html('Rp. 0');

          $('#load-view').empty()
        }
      }
    })
  });
</script>