<script>
  $(document).on('click', '.add-item', function() {
    let html = `<div class="row">
                      <div class="col-3 px-0 text-center my-auto">
                        <button class="btn btn-sm btn-outline-orange rounded btn-minus">
                          <i class="fa-solid fa-minus fa-xs"></i>
                        </button>
                      </div>
                      <div class="col-6 px-1">
                        <input type="number" min="0" class="form-control inp-qty" value="1">
                      </div>
                      <div class="col-3 px-0 text-center my-auto">
                        <button class="btn btn-sm btn-outline-orange btn-round btn-add">
                          <i class="fa-solid fa-plus fa-xs"></i>
                        </button>
                      </div>
                    </div>`;

    $(this).parent().html(html)
  });

  $(document).on('click', '.btn-minus', function() {
    let qty = $(this).parent().parent().find('.inp-qty').val();
    qty = qty - 1;
    $(this).parent().parent().find('.inp-qty').val(qty)

    if (qty == 0) {
      let html = `<button class="btn btn-outline-orange btn-round align-self-end me-2 add-item">Tambah</button>`;


      $(this).parent().parent().parent().html(html)
    }
  });
</script>