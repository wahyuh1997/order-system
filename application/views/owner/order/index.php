<nav class="navbar bg-body-tertiary border-bottom border-dark mt-2">
  <div class="container-fluid">
    <h6 class="text-dark-orange"><?= $title; ?></h6>
    <div class="d-flex" role="navbar">
      <a href="<?= base_url('owner'); ?>" class="text-light-orange"><i class="fa-solid fa-house fa-xl"></i></a>
    </div>
  </div>
</nav>

<div class="container my-2">
  <nav>
    <div class="nav nav-underline nav-justified mt-2" id="nav-tab" role="tablist">
      <button class="nav-link active" id="nav-new-tab" data-bs-toggle="tab" data-bs-target="#nav-new" type="button" role="tab" aria-controls="nav-new" aria-selected="true">Pesanan Baru</button>
      <button class="nav-link" id="nav-order-tab" data-bs-toggle="tab" data-bs-target="#nav-order" type="button" role="tab" aria-controls="nav-order" aria-selected="false">Proses</button>
      <button class="nav-link" id="nav-complete-tab" data-bs-toggle="tab" data-bs-target="#nav-complete" type="button" role="tab" aria-controls="nav-complete" aria-selected="false">Selesai</button>
    </div>
  </nav>
  <div class="tab-content" id="nav-tabContent">
    <div class="tab-pane fade show active" id="nav-new" role="tabpanel" aria-labelledby="nav-new-tab" tabindex="0" style="position: relative;">

      <a href="<?= base_url('order/confirm'); ?>" class="text-decoration-none">
        <div class="card mt-3" style="max-width: 540px; box-shadow: 1px 2px #181818;">
          <div class="row g-0 text-light-orange">
            <div class="col-3 text-center my-auto">
              <i class="fa-solid fa-cart-shopping fa-3x"></i>
            </div>
            <div class="col-9">
              <div class="card-body">
                <h6 class="card-title mb-0">Pesanan 0001</h6>
                <small class="card-text">Proses</small>
              </div>
            </div>
          </div>
        </div>
      </a>
      <div class="card mt-3" style="max-width: 540px; box-shadow: 1px 2px #181818;">
        <div class="row g-0 text-light-orange">
          <div class="col-3 text-center my-auto">
            <i class="fa-solid fa-cart-shopping fa-3x"></i>
          </div>
          <div class="col-9">
            <div class="card-body">
              <h6 class="card-title mb-0">Pesanan 0002</h6>
              <small class="card-text">Menunggu Konfirmasi Restoran</small>
            </div>
          </div>
        </div>
      </div>
      <!-- <p class="mt-5 text-dark-orange fw-bold text-center">
        Tidak ada pesanan, silahkan melakukan pemesanan.
      </p> -->
    </div>
    <div class="tab-pane fade" id="nav-order" role="tabpanel" aria-labelledby="nav-order-tab" tabindex="0">
      <div class="card mt-3" style="max-width: 540px; box-shadow: 1px 2px #181818;">
        <div class="row g-0 text-light-orange">
          <div class="col-3 text-center my-auto">
            <i class="fa-solid fa-cart-shopping fa-3x"></i>
          </div>
          <div class="col-9">
            <div class="card-body">
              <h6 class="card-title mb-0">Pesanan 0001</h6>
              <small class="card-text">Proses</small>
            </div>
          </div>
        </div>
      </div>
      <div class="card mt-3" style="max-width: 540px; box-shadow: 1px 2px #181818;">
        <div class="row g-0 text-light-orange">
          <div class="col-3 text-center my-auto">
            <i class="fa-solid fa-cart-shopping fa-3x"></i>
          </div>
          <div class="col-9">
            <div class="card-body text-danger">
              <h6 class="card-title mb-0">Pesanan 0002</h6>
              <small class="card-text">Dibatalkan</small>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="tab-pane fade" id="nav-complete" role="tabpanel" aria-labelledby="nav-complete-tab" tabindex="0">
      <div class="card mt-3" style="max-width: 540px; box-shadow: 1px 2px #181818;">
        <div class="row g-0 text-light-orange">
          <div class="col-3 text-center my-auto">
            <i class="fa-solid fa-cart-shopping fa-3x"></i>
          </div>
          <div class="col-9">
            <div class="card-body">
              <h6 class="card-title mb-0">Pesanan 0001</h6>
              <small class="card-text">Proses</small>
            </div>
          </div>
        </div>
      </div>
      <div class="card mt-3" style="max-width: 540px; box-shadow: 1px 2px #181818;">
        <div class="row g-0 text-light-orange">
          <div class="col-3 text-center my-auto">
            <i class="fa-solid fa-cart-shopping fa-3x"></i>
          </div>
          <div class="col-9">
            <div class="card-body text-danger">
              <h6 class="card-title mb-0">Pesanan 0003</h6>
              <small class="card-text">Dibatalkan</small>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>