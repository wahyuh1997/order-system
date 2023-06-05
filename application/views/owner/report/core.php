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
</script>