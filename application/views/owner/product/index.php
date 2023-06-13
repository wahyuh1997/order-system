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
          <input type="text" id="search" class="form-control" placeholder="Cari Produk">
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
    <?php foreach ($item as $item) : ?>
      <a href="<?= base_url('owner/product/detail/' . $item['id']); ?>" class="text-decoration-none">
        <div class="card mb-3 <?= $item['is_available'] == 0 ? 'not-avail' : ''; ?>" style="max-width: 540px;">
          <div class="row g-0" style="height: 100%;">
            <div class="col-3 my-auto">
              <img src="<?= $item['image'] == null ? base_url('assets/img/no-image.png') : base_url('assets/img/product/') . $item['image']; ?>" class="img-fluid" style="width: 100%; max-height: 88px;" alt="Cake 1">
            </div>
            <div class="col-9">
              <div class="card-body">
                <h6 class="card-title text-dark-orange"><?= $item['product_name']; ?></h6>
                <small class="card-text text-light-orange"><?= $item['description']; ?></small>
              </div>
            </div>
          </div>
        </div>
      </a>
    <?php endforeach; ?>
  </section>
</div>