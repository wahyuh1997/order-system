<div class="container my-2">
  <nav class="navbar bg-body-tertiary border-bottom border-dark">
    <div class="container-fluid">
      <div class="fw-bold" role="navbar">
        <a href="<?= base_url(''); ?>" class="text-light-orange d-inline me-3"><i class="fa-solid fa-arrow-left"></i></a>
        <h6 class="d-inline-block text-dark-orange">Pesanan</h6>
      </div>
    </div>
  </nav>

  <!-- Info Product -->
  <section class="mt-3">
    <h6 class="text-dark-orange">Informasi Produk</h6>
    <div class="card">
      <div class="card-body text-dark-orange py-2">
        <div>
          <p class="mb-0 fw-bold">Tanggal Pesanan</p>
          <span class="ms-3">13/05/2023</span>
        </div>
        <div>
          <p class="mb-0 fw-bold">Estimasi Pre-Order</p>
          <span class="ms-3">3 Hari (setelah pesanan dikonfirmasi)</span>
        </div>
        <div>
          <p class="mb-0 fw-bold">Layanan Pesanan</p>
          <span class="ms-3">Mengambil Pesanan Sendiri</span>
        </div>
      </div>
    </div>
  </section>
  <!-- End Of info Product -->

  <!-- Ringkasan Pesanan -->
  <section class="mt-3">
    <div class="card mb-3" style="max-width: 540px;">

      <?php foreach ($cart_item as $cart) : ?>
        <div class="row g-0">
          <div class="col-3">
            <img src="<?= base_url('assets/img/cake 1.png'); ?>." class="img-fluid rounded-start" style="height: 100%;" alt="Cake 1">
          </div>
          <div class="col-9">
            <div class="card-body py-2">
              <h6 class="card-title text-dark-orange"><?= $cart['product_name']; ?></h6>
              <div class="row">
                <div class="col-5 my-auto">
                  <h6 class="card-text text-dark-orange">Rp. <?= number_format($cart['price'], '0', ',', '.'); ?></h6>
                </div>
                <div class="col-7 ps-0">
                  <div class="row">
                    <div class="col-2 offset-1 px-0 text-center my-auto">
                      <button class="btn btn-sm btn-outline-orange rounded btn-minus">
                        <i class="fa-solid fa-minus fa-xs"></i>
                      </button>
                    </div>
                    <div class="col-4 px-1">
                      <input type="number" min="0" class="form-control inp-qty" data-id="<?= $cart['menu_id']; ?>" data-price="<?= $cart['price']; ?>" value="<?= $cart['item']; ?>">
                    </div>
                    <div class="col-2 px-0 text-center my-auto">
                      <button class="btn btn-sm btn-outline-orange btn-round btn-add">
                        <i class="fa-solid fa-plus fa-xs"></i>
                      </button>
                    </div>
                    <div class="col-3 px-0 text-center my-auto">
                      <button type="button" class="btn btn-sm btn-outline-orange btn-round btn-del" data-id="<?= $cart['menu_id']; ?>">
                        <i class="fa-solid fa-trash fa-xs"></i>
                      </button>
                    </div>
                  </div>
                </div>

              </div>

            </div>
          </div>
        </div>
      <?php
        $total_price[] = $cart['price'] *  $cart['item'];
      endforeach; ?>

    </div>
  </section>

  <!-- btn add new Product -->
  <section class="d-grid gap-2 mt-2">
    <a href="<?= base_url(); ?>" class="btn btn-sm btn-outline-darkorange">Tambahkan Produk Lain</a>
  </section>

  <!-- Payment Info -->
  <section class="mt-3 payment-detail">
    <p class="mb-0 text-dark-orange">Rincian Pembayaran</p>
    <div class="card">
      <div class="card-body text-dark-orange">
        <div class="row">
          <div class="col-6">
            Total Pembayaran
          </div>
          <div class="col-6 text-end total-price">

          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Order Button -->
  <section class="d-grid gap-2 mt-2">
    <a href="<?= base_url('order/payment'); ?>" id="btn-order" class="btn btn-orange">Pesan</a>
  </section>
</div>