<div class="fixed-top" style="background-color: #F7F7F7;">
  <nav class="navbar bg-body-tertiary border-bottom border-dark mt-2">
    <div class="container-fluid">
      <h6 class="text-dark-orange"><?= $title; ?></h6>
      <div class="d-flex" role="navbar">
        <a href="<?= base_url('owner'); ?>" class="text-light-orange"><i class="fa-solid fa-house fa-xl"></i></a>
      </div>
    </div>
  </nav>

  <div class="main-header mt-2 px-2 pb-3">
    <div class="row">
      <div class="col-8">
        <div class="input-group rounded-2" style="box-shadow: 1px 2px #181818;">
          <span class="input-group-text"><i class="fa-solid fa-magnifying-glass"></i></span>
          <input type="text" class="form-control" placeholder="Cari Produk">
        </div>
      </div>
      <div class="col-4 my-auto px-0">
        <a href="<?= base_url('owner/product/add'); ?>" class="btn btn-sm btn-orange rounded">Tambah Produk</a>
      </div>
    </div>
  </div>
</div>

<div class="container" style="margin-top: 107px;">
  <section>
    <a href="<?= base_url('owner/product/detail'); ?>" class="text-decoration-none">
      <div class="card mb-3" style="max-width: 540px;">
        <div class="row g-0">
          <div class="col-3">
            <img src="<?= base_url('assets/img/cake 1.png'); ?>." class="img-fluid rounded-start" style="height: 100%;" alt="Cake 1">
          </div>
          <div class="col-9">
            <div class="card-body p-1">
              <h6 class="card-title text-dark-orange">Brownies Coklat</h6>
              <small class="card-text text-light-orange">Brownies coklat dengan <br> tekstur yang lembut</small>
            </div>
          </div>
        </div>
      </div>
    </a>
  </section>
</div>