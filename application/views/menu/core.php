<script>
  $(document).on('click', '.add-item', function() {
    /* First Add Item to Cart */
    let menu_id = $(this).data('id');
    add_to_cart('add', 1);

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

  $(document).on('click', '.btn-add', function() {
    let qty = $(this).parent().parent().find('.inp-qty').val();
    qty = parseInt(qty) + parseInt(1);
    $(this).parent().parent().find('.inp-qty').val(qty).trigger('change');
  });

  $(document).on('click', '.btn-minus', function() {
    let qty = $(this).parent().parent().find('.inp-qty').val();
    qty = qty - 1;
    $(this).parent().parent().find('.inp-qty').val(qty).trigger('change')

    if (qty == 0) {
      let html = `<button class="btn btn-outline-orange btn-round align-self-end me-2 add-item">Tambah</button>`;
      $(this).parent().parent().parent().html(html)
    }

  });

  $(document).on('keyup', '#search', function() {
    let search = $(this).val();

    $.ajax({
      url: 'menu/search/' + search,
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

  $(document).on('change', '.inp-qty', function() {
    let qty = $(this).val();
    let menu_id = $(this).data('id');

    add_to_cart('update', menu_id, qty);
  });

  load_cart()

  function load_cart() {
    $.get('menu/load_cart', function(data) {
      let res = JSON.parse(data)
      console.log(res);
      if (res.status == true) {
        let html = `<a href="${res.url}">
                <div class="bottom-cart px-2">
                  <div class="card bg-dark-orange">
                    <div class="card-body p-2 text-white">
                      <div class="row">
                        <div class="col-6">
                          ${res.total_qty} Produk
                        </div>
                        <div class="col-6 d-flex justify-content-end align-items-center">
                          <p class="mb-0 me-3">Rp. ${numberWithCommas(res.total_price)}</p>
                          <i class="fa-solid fa-cart-shopping me-3"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </a>`;

        $('.load-cart').html(html);
      }

    });
  }

  function add_to_cart(status, menu_id, qty) {
    $.ajax({
      url: 'menu/add_to_cart/' + status,
      method: 'POST',
      dataType: 'JSON',
      async: true,
      data: {
        menu_id: menu_id,
        item: qty
      },
      success: function(data) {
        load_cart()
      }
    })
  }

  function numberWithCommas(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
  }
</script>