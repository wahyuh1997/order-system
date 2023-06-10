<script src="<?= base_url('assets/bootstrap-5.3.0-alpha3-dist/js/bootstrap.bundle.js'); ?>"></script>
<script src="<?= base_url('assets/js/code.jquery.com_jquery-3.7.0.js'); ?>"></script>
<script src="<?= base_url('assets/js/jquery.mask.js'); ?>"></script>
<script src="<?= base_url('assets/js/moment.min.js'); ?>"></script>
<script src="<?= base_url('assets/js/daterangepicker.js'); ?>"></script>
<script src="<?= base_url('assets/js/sweetalert2.all.js'); ?>"></script>
<script src="<?= base_url('node_modules/bootstrap5-toggle/js/bootstrap5-toggle.jquery.js'); ?>"></script>
<script src="<?= base_url('assets/js/script.js'); ?>"></script>
<script>
  /* Delete Function */
  $(document).on('click', '.del-sel', function(e) {
    e.preventDefault();

    // init
    var url = $(this).attr('href');
    var redUrl = $(this).data('redurl');

    // confirmation
    Swal.fire({
      icon: 'question',
      title: 'Hapus Produk',
      showCancelButton: true,
      confirmButtonText: `Hapus Produk`,
      cancelButtonText: 'Batal',
      reverseButtons: true,
      text: 'Apakah anda yakin akan menghapus produk ini ?',
    }).then((result) => {
      // check if confirmed
      if (result.isConfirmed) {
        // do delete
        $.get(url, function(response) {
          // parsing the json
          let textParse = JSON.parse(response);

          // check status of response
          if (textParse.status == true) {
            Swal.fire({
              icon: 'success',
              title: "Success",
              confirmButtonText: `OK`,
              text: 'Produk Berhasil Dihapus',
            }).then((result) => {
              if (result.isConfirmed) {
                window.location.href = window.location.href;
              }
            });
          } else {
            Swal.fire({
              icon: 'error',
              title: "{{Failed}}",
              text: textParse.message,
            })
          }
        });
      }
    });
  });
</script>
</body>

</html>