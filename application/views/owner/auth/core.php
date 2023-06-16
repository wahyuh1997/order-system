<script>
  const togglePassword = document.querySelector("#togglePassword");
  const password = document.querySelector("#password");

  togglePassword.addEventListener("click", function() {
    // toggle the type attribute
    const type = password.getAttribute("type") === "password" ? "text" : "password";
    password.setAttribute("type", type);

    // toggle the icon
    this.classList.toggle("fa-eye");
  });


  // $('#regLogForm').on('submit', function(e) {
  //   e.preventDefault();
  //   // init
  //   var url = $(this).attr('action');
  //   var redUrl = $(this).data('redurl');
  //   var form_data = new FormData($(this)[0]);
  //   $.ajax({
  //     type: 'POST',
  //     url: url,
  //     data: form_data,
  //     dataType: 'JSON',
  //     async: true,
  //     processData: false,
  //     contentType: false,
  //     beforeSend: function() {
  //       $('.bg-process').fadeIn();
  //     },
  //     success: function(textParse) {
  //       $('.bg-process').attr('style', 'display: none !important');

  //       if (textParse.status == true) {
  //         Swal.fire({
  //           icon: 'success',
  //           title: 'Berhasil',
  //           text: textParse.message,
  //         }).then((result) => {
  //           if (result.isConfirmed) {
  //             window.location.href = redUrl;
  //           }
  //         });
  //       } else {
  //         Swal.fire({
  //           icon: 'error',
  //           title: 'Gagal',
  //           text: textParse.message,
  //         })
  //       }
  //     }
  //   }).fail(function(jqXHR, ajaxOptions, thrownError) {
  //     $('.bg-process').attr('style', 'display: none !important');
  //     Swal.fire({
  //       icon: 'error',
  //       title: 'Failed',
  //       text: 'Server Not Responding',
  //     })
  //   });
  // });
</script>