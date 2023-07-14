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
      <h6 class="mb-0 text-light-orange fw-bold"><?= $data['product_name']; ?></h6>
      <img src="<?= $data['image'] == null ? base_url('assets/img/no-image.png') : base_url('assets/img/product/' . $data['image']); ?>" class="img-fluid rounded-start" style="width: 100%; height: 25em;" alt="Cake 1">

      <div class="mb-3">
        <p class="mb-0 text-light-orange fw-bold">Nama Produk</p>
        <small><?= $data['product_name']; ?></small>
      </div>
      <div class="mb-3">
        <p class="mb-0 text-light-orange fw-bold">Harga Produk</p>
        <small>Rp. <?= number_format($data['price'], 0, ',', '.'); ?></small>
      </div>
      <div class="mb-3">
        <p class="mb-0 text-light-orange fw-bold">Deskripsi</p>
        <small><?= $data['description']; ?></small>
      </div>
    </div>
  </div>

  <section class="mt-5">
    <div class="row">
      <div class="col-6">
        <div class="d-grid gap-2">
          <a href="<?= base_url('owner/product/edit/' . $data['id']); ?>" class="btn btn-orange">Ubah</a>
        </div>
      </div>
      <div class="col-6">
        <div class="d-grid gap-2">
          <a href="<?= base_url('owner/product/delete/' . $data['id']); ?>" class="btn btn-orange del-sel" data-redurl='<?= base_url('owner/product'); ?>'>Hapus</a>
        </div>
      </div>
    </div>
  </section>
</div>