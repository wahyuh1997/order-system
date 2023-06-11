<?php foreach ($item as $item) : ?>
  <a href="<?= base_url('owner/product/detail/' . $item['id']); ?>" class="text-decoration-none">
    <div class="card mb-3 <?= $item['is_available'] == 0 ? 'not-avail' : ''; ?>" style="max-width: 540px;">
      <div class="row g-0" style="height: 100%;">
        <div class="col-3 my-auto">
          <img src="<?= $item['image'] == null ? base_url('assets/img/no-image.png') : base_url('assets/img/product/') . $item['image']; ?>." class="img-fluid" style="width: 100%; max-height: 88px;" alt="Cake 1">
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