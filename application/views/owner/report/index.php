<div class="fixed-top" style="background-color: #F7F7F7;">
  <nav class="navbar bg-body-tertiary border-bottom border-dark mt-2">
    <div class="container-fluid">
      <h6 class="text-dark-orange"><?= $title; ?></h6>
      <div class="d-flex" role="navbar">
        <a href="<?= base_url('owner'); ?>" class="text-light-orange"><i class="fa-solid fa-house fa-xl"></i></a>
      </div>
    </div>
  </nav>

  <div class="container my-2">
    <label for="name" class="form-label text-light-orange">Tanggal Laporan</label>
    <input type="text" class="form-control daterange" data-start-date="<?= date('Y-m-01'); ?>" data-end-date="<?= date('Y-m-d'); ?>">

    <section class="mt-3">
      <div class="card">
        <div class="card-body">
          <div class="row mb-2">
            <div class="col-6">
              <h6 class="card-title text-dark-orange">Total Penjualan</h6>
              <small class="card-text text-light-orange">Rp. 750.000</small>
            </div>
            <div class="col-6">
              <h6 class="card-title text-dark-orange">Pesanan Dibatalkan</h6>
              <small class="card-text text-light-orange">0</small>
            </div>
          </div>
          <div class="row">
            <div class="col-6">
              <h6 class="card-title text-dark-orange">Jumlah Penjualan</h6>
              <small class="card-text text-light-orange">20</small>
            </div>
            <div class="col-6">
              <h6 class="card-title text-dark-orange">Jumlah Produk</h6>
              <small class="card-text text-light-orange">50</small>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</div>

<div class="container" style="margin-top: 300px;">
  <div class="section mt-3">
    <div class="card">
      <div class="card-body">

        <!-- Loop Here -->
        <div class="row mb-3">
          <div class="col-2 my-auto p-0">
            <div class="card">
              <div class="card-body px-0 mx-auto"><i class="fa-solid fa-cart-shopping fa-2x text-light-orange"></i></div>
            </div>
          </div>
          <div class="col-6 text-dark-orange">
            <h6 class="card-title mb-0">Pesanan 0001</h6>
            <small class="card-text">05 Mei 2023</small>
            <small class="card-text">Najmah frithadila</small>
          </div>
          <div class="col-4 text-dark-orange text-end">
            <h6 class="card-title mb-0">Selesai</h6>
            <small class="card-text">Rp. 75.000</small>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-2 my-auto p-0">
            <div class="card">
              <div class="card-body px-0 mx-auto"><i class="fa-solid fa-cart-shopping fa-2x text-light-orange"></i></div>
            </div>
          </div>
          <div class="col-6 text-dark-orange">
            <h6 class="card-title mb-0">Pesanan 0001</h6>
            <small class="card-text">05 Mei 2023</small>
            <small class="card-text">Najmah frithadila</small>
          </div>
          <div class="col-4 text-dark-orange text-end">
            <h6 class="card-title mb-0">Selesai</h6>
            <small class="card-text">Rp. 75.000</small>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-2 my-auto p-0">
            <div class="card">
              <div class="card-body px-0 mx-auto"><i class="fa-solid fa-cart-shopping fa-2x text-light-orange"></i></div>
            </div>
          </div>
          <div class="col-6 text-dark-orange">
            <h6 class="card-title mb-0">Pesanan 0001</h6>
            <small class="card-text">05 Mei 2023</small>
            <small class="card-text">Najmah frithadila</small>
          </div>
          <div class="col-4 text-dark-orange text-end">
            <h6 class="card-title mb-0">Selesai</h6>
            <small class="card-text">Rp. 75.000</small>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-2 my-auto p-0">
            <div class="card">
              <div class="card-body px-0 mx-auto"><i class="fa-solid fa-cart-shopping fa-2x text-light-orange"></i></div>
            </div>
          </div>
          <div class="col-6 text-dark-orange">
            <h6 class="card-title mb-0">Pesanan 0001</h6>
            <small class="card-text">05 Mei 2023</small>
            <small class="card-text">Najmah frithadila</small>
          </div>
          <div class="col-4 text-dark-orange text-end">
            <h6 class="card-title mb-0">Selesai</h6>
            <small class="card-text">Rp. 75.000</small>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-2 my-auto p-0">
            <div class="card">
              <div class="card-body px-0 mx-auto"><i class="fa-solid fa-cart-shopping fa-2x text-light-orange"></i></div>
            </div>
          </div>
          <div class="col-6 text-dark-orange">
            <h6 class="card-title mb-0">Pesanan 0001</h6>
            <small class="card-text">05 Mei 2023</small>
            <small class="card-text">Najmah frithadila</small>
          </div>
          <div class="col-4 text-dark-orange text-end">
            <h6 class="card-title mb-0">Selesai</h6>
            <small class="card-text">Rp. 75.000</small>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-2 my-auto p-0">
            <div class="card">
              <div class="card-body px-0 mx-auto"><i class="fa-solid fa-cart-shopping fa-2x text-light-orange"></i></div>
            </div>
          </div>
          <div class="col-6 text-dark-orange">
            <h6 class="card-title mb-0">Pesanan 0001</h6>
            <small class="card-text">05 Mei 2023</small>
            <small class="card-text">Najmah frithadila</small>
          </div>
          <div class="col-4 text-dark-orange text-end">
            <h6 class="card-title mb-0">Selesai</h6>
            <small class="card-text">Rp. 75.000</small>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-2 my-auto p-0">
            <div class="card">
              <div class="card-body px-0 mx-auto"><i class="fa-solid fa-cart-shopping fa-2x text-light-orange"></i></div>
            </div>
          </div>
          <div class="col-6 text-dark-orange">
            <h6 class="card-title mb-0">Pesanan 0001</h6>
            <small class="card-text">05 Mei 2023</small>
            <small class="card-text">Najmah frithadila</small>
          </div>
          <div class="col-4 text-dark-orange text-end">
            <h6 class="card-title mb-0">Selesai</h6>
            <small class="card-text">Rp. 75.000</small>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-2 my-auto p-0">
            <div class="card">
              <div class="card-body px-0 mx-auto"><i class="fa-solid fa-cart-shopping fa-2x text-light-orange"></i></div>
            </div>
          </div>
          <div class="col-6 text-dark-orange">
            <h6 class="card-title mb-0">Pesanan 0001</h6>
            <small class="card-text">05 Mei 2023</small>
            <small class="card-text">Najmah frithadila</small>
          </div>
          <div class="col-4 text-dark-orange text-end">
            <h6 class="card-title mb-0">Selesai</h6>
            <small class="card-text">Rp. 75.000</small>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>