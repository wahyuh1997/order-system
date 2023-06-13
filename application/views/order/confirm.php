<div class="container my-2">
  <nav class="navbar bg-body-tertiary border-bottom border-dark">
    <div class="container-fluid">
      <div class="fw-bold" role="search">
        <a href="<?= base_url(''); ?>" class="text-light-orange d-inline me-3"><i class="fa-solid fa-arrow-left"></i></a>
        <h6 class="d-inline-block text-dark-orange"><?= $title; ?></h6>
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

  <!-- Status Order -->
  <section class="mt-3">
    <h6 class="text-dark-orange">Status Pesanan</h6>
    <div class="row">
      <div class="col-2">
        <i class="fa-solid fa-receipt fa-2x active"></i>
      </div>
      <div class="col-3">
        <div style="border-top: 3px solid black; margin-top: 1rem;"></div>
      </div>
      <div class="col-2">
        <i class="fa-solid fa-fire-burner fa-2x"></i>
      </div>
      <div class="col-3">
        <div style="border-top: 3px solid black; margin-top: 1rem;"></div>
      </div>
      <div class="col-2">
        <i class="fa-regular fa-circle-check fa-2x"></i>
      </div>
    </div>
    <small class="text-dark-orange mt-1">
      Menunggu restoran mengkonfirmasi pesanan anda!
    </small>
  </section>
  <!-- End Of Status -->

  <!-- Ringkasan Pesanan -->
  <section class="mt-3">
    <h6 class="text-dark-orange">Pesanan</h6>
    <div class="card border-0">
      <div class="card-body p-0">
        <div class="row g-0 border-bottom mb-2">
          <div class="col-3">
            <img src="<?= base_url('assets/img/cake 1.png'); ?>." class="img-fluid rounded-start" style="height: 100%;" alt="Cake 1">
          </div>
          <div class="col-9">
            <div class="card-body py-2">
              <h6 class="card-title text-dark-orange">Brownies Coklat</h6>
              <div class="row">
                <div class="col-5 my-auto">
                  <h6 class="card-text text-dark-orange">x1</h6>
                </div>
                <div class="col-7 text-dark-orange text-end">
                  Rp. 8000
                </div>

              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="card border-0">
      <div class="card-body p-0">
        <div class="row g-0 border-bottom mb-2">
          <div class="col-3">
            <img src="<?= base_url('assets/img/cake 1.png'); ?>." class="img-fluid rounded-start" style="height: 100%;" alt="Cake 1">
          </div>
          <div class="col-9">
            <div class="card-body py-2">
              <h6 class="card-title text-dark-orange">Brownies Coklat</h6>
              <div class="row">
                <div class="col-5 my-auto">
                  <h6 class="card-text text-dark-orange">x1</h6>
                </div>
                <div class="col-7 text-dark-orange text-end">
                  Rp. 8000
                </div>

              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Payment Info -->
  <section class="mt-3">
    <p class="mb-0 text-dark-orange">Rincian Pembayaran</p>
    <div class="card">
      <div class="card-body text-dark-orange">
        <div class="row">
          <div class="col-6">
            Total Pembayaran
          </div>
          <div class="col-6 text-end">
            Rp. 28,000
          </div>
        </div>
      </div>
    </div>
  </section>

  <form method="post" enctype="multipart/form-data">
    <section>
      <div class="mt-3">
        <label for="formFile" class="text-dark-orange">Bukti Pembayaran</label>
        <input class="form-control form-control-sm" name="image" id="formFile" type="file" accept="image/*">
      </div>
    </section>

    <!-- Order Button -->
    <section class="d-grid gap-2 mt-2">
      <a href="https://api.whatsapp.com/send?phone=08994717893" target="_blank" class="btn btn-orange">Hubungi Penjual via WhatsApp</a>
    </section>
  </form>
</div>