<nav class="navbar bg-body-tertiary border-bottom border-dark mt-2">
  <div class="container-fluid">
    <h6 class="text-dark-orange"><?= $title; ?></h6>
    <div class="d-flex" role="search">
      <a href="<?= base_url('owner/profile'); ?>" class="text-light-orange"><i class="fa-solid fa-circle-user fa-xl"></i></a>
    </div>
  </div>
</nav>

<div class="container mt-2">
  <section class="text-center mt-5">
    <h1 class="text-dark-orange mb-4">Selamat Datang</h1>
    <p class="fw-bold text-dark-orange">Mimi Cakes & Cookies</p>
  </section>

  <section class="mt-5">
    <div class="row text-dark-orange">
      <div class="col-6">
        <p class="fw-bold">Status Penjualan</p>
      </div>
      <div class="col-6 text-end">
        <p class="fw-bold">Pre-Order <?= $is_preorder == 1 ? ' ON' : 'OFF'; ?></p>
      </div>
    </div>
  </section>

  <section>
    <div class="card card-body" style="border: 1px solid #894009;">
      <a href="<?= base_url('owner/order'); ?>" class="text-decoration-none">
        <div class="card">
          <div class="card-body bg-dark-orange text-white rounded">
            <div class="row">
              <div class="col-2">
                <i class="fa-solid fa-cart-shopping fa-lg"></i>
              </div>
              <div class="col">
                Pesanan
              </div>
            </div>
          </div>
        </div>
      </a>
      <a href="<?= base_url('owner/list_produk'); ?>" class="text-decoration-none">
        <div class="card mt-3">
          <div class="card-body bg-dark-orange text-white rounded">
            <div class="row">
              <div class="col-2">
                <i class="fa-solid fa-list fa-lg"></i>
              </div>
              <div class="col">
                List Produk Pesanan
              </div>
            </div>
          </div>
        </div>
      </a>
      <a href="<?= base_url('owner/product'); ?>" class="text-decoration-none">
        <div class="card mt-3">
          <div class="card-body bg-dark-orange text-white rounded">
            <div class="row">
              <div class="col-2">
                <i class="fa-solid fa-database fa-lg"></i>
              </div>
              <div class="col">
                Kelola Data Produk
              </div>
            </div>
          </div>
        </div>
      </a>
      <a href="<?= base_url('owner/report'); ?>" class="text-decoration-none">
        <div class="card mt-3">
          <div class="card-body bg-dark-orange text-white rounded">
            <div class="row">
              <div class="col-2">
                <i class="fa-solid fa-file-invoice fa-lg"></i>
              </div>
              <div class="col">
                Laporan Penjualan
              </div>
            </div>
          </div>
        </div>
      </a>
      <a href="<?= base_url('owner/manage'); ?>" class="text-decoration-none">
        <div class="card mt-3">
          <div class="card-body bg-dark-orange text-white rounded">
            <div class="row">
              <div class="col-2">
                <i class="fa-solid fa-file-pen fa-lg"></i>
              </div>
              <div class="col">
                Pre-Order Management
              </div>
            </div>
          </div>
        </div>
      </a>
    </div>
  </section>
</div>