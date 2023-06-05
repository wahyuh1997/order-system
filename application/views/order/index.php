<div class="container my-2">
  <nav class="navbar bg-body-tertiary border-bottom border-dark">
    <div class="container-fluid">
      <span class="navbar-brand mb-0 h1 text-dark-orange fw-bold">Pesanan Saya</span>
    </div>
  </nav>

  <nav>
    <div class="nav nav-underline nav-justified mt-2" id="nav-tab" role="tablist">
      <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Proses</button>
      <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Riwayat</button>
    </div>
  </nav>
  <div class="tab-content" id="nav-tabContent">
    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0" style="position: relative;">

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
    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab" tabindex="0">
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
  </div>
</div>