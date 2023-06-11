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
    <input type="text" id="search" class="form-control" placeholder="Cari Produk">
  </div>
</section>

<div class="container main-content">
  <section>
    <?php foreach ($item as $item) : ?>
      <?php foreach ($cart_item as $cart) : ?>
        <?php if ($item['id'] == $cart['menu_id']) : ?>
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
                    <div class="col my-auto">
                      <h5 class="card-text text-dark-orange">Rp. <?= $item['price']; ?></h5>
                    </div>
                    <?php if ($item['is_available'] == 1) : ?>
                      <div class="col-5 ps-0">
                        <div class="row">
                          <div class="col-3 px-0 text-center my-auto">
                            <button class="btn btn-sm btn-outline-orange rounded btn-minus">
                              <i class="fa-solid fa-minus fa-xs"></i>
                            </button>
                          </div>
                          <div class="col-6 px-1">
                            <input type="number" min="0" class="form-control inp-qty" data-id="<?= $cart['id']; ?>" value="<?= $cart['item']; ?>">
                          </div>
                          <div class="col-3 px-0 text-center my-auto">
                            <button class="btn btn-sm btn-outline-orange btn-round btn-add">
                              <i class="fa-solid fa-plus fa-xs"></i>
                            </button>
                          </div>
                        </div>
                      </div>
                    <?php endif; ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php else : ?>
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
                    <div class="col my-auto">
                      <h5 class="card-text text-dark-orange">Rp. <?= $item['price']; ?></h5>
                    </div>
                    <?php if ($item['is_available'] == 1) : ?>
                      <div class="col-5 ps-0">
                        <button class="btn btn-outline-orange btn-round align-self-end me-2 add-item">Tambah</button>
                      </div>
                    <?php endif; ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php endif; ?>
      <?php endforeach; ?>

      <?php if (!isset($_SESSION['os_user'])) : ?>
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
                  <div class="col my-auto">
                    <h5 class="card-text text-dark-orange">Rp. <?= $item['price']; ?></h5>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php endif; ?>
    <?php endforeach; ?>

  </section>

  <div class="load-cart">

  </div>
</div>