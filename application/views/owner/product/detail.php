<nav class="navbar bg-body-tertiary border-bottom border-dark mt-2">
  <div class="container-fluid">
    <div class="fw-bold" role="search">
      <a href="<?= base_url('owner/product'); ?>" class="text-light-orange d-inline me-3"><i class="fa-solid fa-arrow-left"></i></a>
      <h6 class="d-inline-block text-dark-orange"><?= $title; ?></h6>
    </div>
  </div>
</nav>

<div class="container mt-2">
  <div class="h4 text-dark-orange">
    Detail Produk
  </div>

  <div class="card">
    <div class="card-body text-light-orange">
      <h6 class="mb-0 text-light-orange fw-bold">Donat Coklat</h6>
      <img src="<?= base_url('assets/img/cake 1.png'); ?>." class="img-fluid rounded-start" style="height: 100%;" alt="Cake 1">

      <div class="mb-3">
        <p class="mb-0 text-light-orange fw-bold">Nama Produk</p>
        <small>Donat Coklat</small>
      </div>
      <div class="mb-3">
        <p class="mb-0 text-light-orange fw-bold">Harga Produk</p>
        <small>Rp. 8.000</small>
      </div>
      <div class="mb-3">
        <p class="mb-0 text-light-orange fw-bold">Deskripsi</p>
        <small>Donat Coklat dengan tekstur yang lembut</small>
      </div>
    </div>
  </div>

  <section class="mt-5">
    <div class="row">
      <div class="col-6">
        <div class="d-grid gap-2">
          <a href="<?= base_url('owner/product/edit'); ?>" class="btn btn-orange">Ubah</a>
        </div>
      </div>
      <div class="col-6">
        <div class="d-grid gap-2">
          <a href="" class="btn btn-orange">Hapus</a>
        </div>
      </div>
    </div>
  </section>
</div>