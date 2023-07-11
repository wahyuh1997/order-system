<nav class="navbar bg-body-tertiary border-bottom border-dark mt-2">
  <div class="container-fluid">
    <div class="fw-bold" role="search">
      <a href="<?= base_url('order'); ?>" class="text-light-orange d-inline me-3"><i class="fa-solid fa-arrow-left"></i></a>
      <h6 class="d-inline-block text-dark-orange"><?= $title; ?></h6>
    </div>
  </div>
</nav>

<div class="container my-2">
  <!-- Info Product -->
  <section class="mt-3">
    <h6 class="mb-0 text-dark-orange">Informasi Produk</h6>
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

  <!-- Payment Info -->
  <section class="mt-3">
    <h6 class="mb-0 text-dark-orange">Rincian Pembayaran</h6>
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

  <form id="frmsubmit" method="post" enctype="multipart/form-data">
    <input type="hidden" name="type">
    <!-- Transfer Info -->
    <section class="mt-3">
      <h6 class="mb-0 text-dark-orange">Metode Pembayaran</h6>
      <div class="card">
        <div class="card-body text-dark-orange">
          <div>
            <p class="mb-0 text-light-orange">Transfer Bank</p>
            <img src="<?= base_url('assets/img/bca.png'); ?>" alt="">
          </div>
          <div class="mt-3">
            <p class="mb-0 text-light-orange">No. Rekening</p>
            <div class="card">
              <div class="card-body p-2 text-light-orange">
                7615134380
              </div>
            </div>
          </div>
          <div class="mt-3">
            <p class="mb-0 text-light-orange">Nama</p>
            <div class="card">
              <div class="card-body p-2 text-light-orange">
                Ismi Retno Utari
              </div>
            </div>
          </div>
          <div class="mt-3">
            <label for="formFile" class="text-light-orange">Unggah Bukti Pembayaran</label>
            <input class="form-control form-control-sm upd-image rounded" name="image" id="formFile" type="file" accept="image/*">
          </div>
        </div>
      </div>
    </section>

    <!-- Order Button -->
    <section class="d-grid gap-2 mt-2">
      <button type="submit" id="btn-submit-order" class="btn btn-orange" name="submit" disabled>Bayar</button>
      <a href="<?= base_url('order/self_canceled/' . $this->uri->segment(3)); ?>" data-redurl='<?= base_url('order'); ?>' id="btn-cancel-order" class="btn btn-secondary">Batalkan Pesanan</a>
    </section>
  </form>
</div>