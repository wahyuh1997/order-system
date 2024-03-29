<style>
  .card.active h6,
  .card.active img {
    color: #CC6D25 !important;
    filter: none !important;
  }
</style>
<div class="main-header fixed-top" style="background-color: #F7F7F7;">
  <nav class="navbar bg-body-tertiary border-bottom border-dark mt-2">
    <div class="container-fluid">
      <h6 class="text-dark-orange"><?= $title; ?></h6>
      <div class="d-flex" role="navbar">
        <a href="<?= base_url('owner'); ?>" class="text-light-orange"><i class="fa-solid fa-house fa-xl"></i></a>
      </div>
    </div>
  </nav>

  <section class="text-center px-3 py-3">
    <div class="row">
      <div class="col-6 fw-bold text-dark-orange text-start">
        Status Penjualan
      </div>
      <div class="col-6 fw-bold text-dark-orange text-end">
        <input type="checkbox" id="order-toggle" class="order-toggle" data-toggle="toggle" <?= $is_preorder == 1 ? ' checked' : ''; ?> onchange="toggle_all()">
      </div>
    </div>
  </section>
</div>

<div class="container" style="margin-top: 140px;">
  <section class="mt-3">

    <?php foreach ($item as $item) : ?>
      <div class="card mb-2 <?= $item['is_available'] == 1 ? 'active' : ''; ?>" style="cursor: pointer;">
        <div class="row g-0">
          <div class="col-4 p-2">
            <img src="<?= base_url('assets/img/product/' . $item['image']); ?>" class="img-fluid rounded-start img-thumbnail" style="filter: grayscale(100%); width: 100%; height: 7rem;" alt="Cake 1">
          </div>
          <div class="col-8 align-items-center">
            <div class="card-body ps-1 py-1" style="height: 100%;">
              <div class="row mt-2">
                <div class="col-10">
                  <h6 class="card-title mb-0" style="color: #ACAAAA;"><?= $item['product_name']; ?></h6>
                  <small><?= $item['description']; ?></small>
                </div>
                <div class="col-2 text-end">
                  <div class="form-check fs-3">
                    <input class="form-check-input" type="checkbox" data-id="<?= $item['id']; ?>" value="<?= $item['is_available']; ?>" <?= $item['is_available'] == 1 ? 'checked' : ''; ?>>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </section>

</div>