<section class="px-3 mt-3">
  <h1 class="text-dark-orange font-weight-bold mb-4">Mimi Cakes & Cookies</h1>
  <p class="mb-0 text-dark-orange">Pre-Order Makanan</p>
  <p class="mb-0 text-dark-orange">Estimasi Pre-Order 3 hari</p>
  <p class="mb-0 text-dark-orange">Pesanan Mengambil Sendiri </p>
  <p class="mb-0 text-dark-orange">Jl. Grand Boulevard BSD City, Sampora, Kec. Cisauk, Tangerang, Banten 15345</p>
</section>

<section class="px-2 sticky-top py-3">
  <div class="input-group rounded-2" style="box-shadow: 1px 2px #181818;">
    <span class="input-group-text"><i class="fa-solid fa-magnifying-glass"></i></span>
    <input type="text" class="form-control" placeholder="Cari Produk">
  </div>
</section>

<div class="container main-content">
  <section>

    <?php foreach ($item as $item) : ?>
      <div class="card mb-2 <?= $item['is_available'] == 0 ? 'not-avail' : ''; ?>" style="max-width: 540px;">
        <div class="row g-0">
          <div class="col-3">
            <img src="<?= $item['image'] == null ? base_url('assets/img/no-image.png') : base_url('assets/img/product/') . $item['image']; ?>" class="img-fluid rounded-start" style="height: 100%;" alt="Cake 1">
          </div>
          <div class="col-9">
            <div class="card-body py-2">
              <h5 class="card-title text-dark-orange"><?= $item['product_name']; ?></h5>
              <small class="card-text text-light-orange"><?= $item['description']; ?></small>
              <div class="row">
                <div class="col-7 my-auto">
                  <h5 class="card-text text-dark-orange">Rp. <?= $item['price']; ?></h5>
                </div>
                <div class="col-5 ps-0">
                  <button class="btn btn-outline-orange btn-round align-self-end me-2 add-item">Tambah</button>
                </div>

              </div>

            </div>
          </div>
        </div>
      </div>
    <?php endforeach; ?>

  </section>

  <a href="<?= base_url('order/detail'); ?>">
    <div class="bottom-cart px-2">
      <div class="card bg-dark-orange">
        <div class="card-body p-2 text-white">
          <div class="row">
            <div class="col-6">
              3 Produk
            </div>
            <div class="col-6 d-flex justify-content-end align-items-center">
              <p class="mb-0 me-3">Rp. 28.000</p>
              <i class="fa-solid fa-cart-shopping me-3"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </a>
</div>