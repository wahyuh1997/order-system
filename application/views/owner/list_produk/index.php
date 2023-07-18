<nav class="navbar bg-body-tertiary border-bottom border-dark mt-2">
  <div class="container-fluid">
    <h6 class="text-dark-orange"><?= $title; ?></h6>
    <div class="d-flex" role="navbar">
      <a href="<?= base_url('owner'); ?>" class="text-light-orange"><i class="fa-solid fa-house fa-xl"></i></a>
    </div>
  </div>
</nav>

<div class="container mt-2">
  <section class="text-center mt-5">
    <div class="row">
      <div class="col-6 fw-bold text-dark-orange">
        Status Penjualan
      </div>
      <div class="col-6 fw-bold text-dark-orange">
        Pre-Order <?= $data['is_preorder'] == 1 ? ' ON' : 'OFF'; ?>
      </div>
    </div>
  </section>

  <section class="mt-3">
    <?php if (count($data['menu']) > 0) : ?>
      <?php foreach ($data['menu'] as $item) : ?>
        <a href="<?= base_url('owner/list_produk/detail/' . $item['menu_id']); ?>" class="text-decoration-none">
          <div class="card mb-2">
            <div class="row g-0">
              <div class="col-4">
                <img src="<?= $item['image'] == null ? base_url('assets/img/no-image.png') : base_url('assets/img/product/') . $item['image']; ?>" class="img-fluid" style="width: 100%; height: 6rem;" alt="Cake 1">
              </div>
              <div class="col-8 align-items-center">
                <div class="card-body ps-1" style="height: 100%;">
                  <div class="row mt-2">
                    <div class="col-9">
                      <h6 class="card-title text-dark-orange mb-0"><?= $item['product_name']; ?></h6>
                    </div>
                    <div class="col-3 text-end">
                      <h5 class="mb-0 text-dark-orange"><?= $item['item']; ?></h5>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </a>
      <?php endforeach; ?>
    <?php else : ?>
      <p class="mt-5 text-dark-orange fw-bold text-center">
        Tidak ada pesanan.
      </p>
    <?php endif; ?>
  </section>

</div>