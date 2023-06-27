<?php foreach ($item as $item) : ?>
  <?php if (count($cart_item) > 0) : ?>
    <?php foreach ($cart_item as $cart) : ?>
      <?php if ($item['id'] == $cart['menu_id'] && $cart['customer_id'] == $_SESSION['os_user']['id']) : ?>
        <div class="card mb-2 <?= $item['is_available'] == 0 ? 'not-avail' : ''; ?>">
          <div class="row g-0">
            <div class="col-3">
              <img src="<?= $item['image'] == null ? base_url('assets/img/no-image.png') : base_url('assets/img/product/') . $item['image']; ?>" class="img-fluid rounded-start" style="height: 100%;" alt="Cake 1">
            </div>
            <div class="col-9">
              <div class="card-body py-2">
                <h5 class="card-title text-dark-orange"><?= $item['product_name']; ?></h5>
                <small class="card-text text-light-orange"><?= $item['description']; ?></small>
                <div class="row">
                  <div class="col my-auto">
                    <h5 class="card-text text-dark-orange">Rp. <?= $item['price']; ?></h5>
                  </div>
                  <?php if ($item['is_available'] == 1) : ?>
                    <div class="col-5 ps-0">
                      <div class="row">
                        <div class="col-3 px-0 text-center my-auto">
                          <button class="btn btn-sm btn-outline-orange rounded btn-minus">
                            <i class="fa-solid fa-minus fa-xs"></i>
                          </button>
                        </div>
                        <div class="col-6 px-1">
                          <input type="number" min="0" class="form-control inp-qty" data-id="<?= $item['id']; ?>" value="<?= $cart['item']; ?>">
                        </div>
                        <div class="col-3 px-0 text-center my-auto">
                          <button class="btn btn-sm btn-outline-orange btn-round btn-add">
                            <i class="fa-solid fa-plus fa-xs"></i>
                          </button>
                        </div>
                      </div>
                    </div>
                  <?php endif; ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php else : ?>
        <div class="card mb-2 <?= $item['is_available'] == 0 ? 'not-avail' : ''; ?>">
          <div class="row g-0">
            <div class="col-3">
              <img src="<?= $item['image'] == null ? base_url('assets/img/no-image.png') : base_url('assets/img/product/') . $item['image']; ?>" class="img-fluid rounded-start" style="height: 100%;" alt="Cake 1">
            </div>
            <div class="col-9">
              <div class="card-body py-2">
                <h5 class="card-title text-dark-orange"><?= $item['product_name']; ?></h5>
                <small class="card-text text-light-orange"><?= $item['description']; ?></small>
                <div class="row">
                  <div class="col my-auto">
                    <h5 class="card-text text-dark-orange">Rp. <?= $item['price']; ?></h5>
                  </div>
                  <?php if ($item['is_available'] == 1) : ?>
                    <div class="col-5 ps-0">
                      <button class="btn btn-outline-orange btn-round align-self-end me-2 add-item">Tambah</button>
                    </div>
                  <?php endif; ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php endif; ?>
    <?php endforeach; ?>
  <?php else : ?>
    <div class="card mb-2 <?= $item['is_available'] == 0 ? 'not-avail' : ''; ?>">
      <div class="row g-0">
        <div class="col-3">
          <img src="<?= $item['image'] == null ? base_url('assets/img/no-image.png') : base_url('assets/img/product/') . $item['image']; ?>" class="img-fluid rounded-start" style="height: 100%;" alt="Cake 1">
        </div>
        <div class="col-9">
          <div class="card-body py-2">
            <h5 class="card-title text-dark-orange"><?= $item['product_name']; ?></h5>
            <small class="card-text text-light-orange"><?= $item['description']; ?></small>
            <div class="row">
              <div class="col my-auto">
                <h5 class="card-text text-dark-orange">Rp. <?= $item['price']; ?></h5>
              </div>
              <?php if ($item['is_available'] == 1) : ?>
                <div class="col-5 ps-0">
                  <button class="btn btn-outline-orange btn-round align-self-end me-2 add-item" data-id="<?= $item['id']; ?>">Tambah</button>
                </div>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  <?php endif; ?>

  <?php if (!isset($_SESSION['os_user'])) : ?>
    <div class="card mb-2 <?= $item['is_available'] == 0 ? 'not-avail' : ''; ?>">
      <div class="row g-0">
        <div class="col-3">
          <img src="<?= $item['image'] == null ? base_url('assets/img/no-image.png') : base_url('assets/img/product/') . $item['image']; ?>" class="img-fluid rounded-start" style="height: 100%;" alt="Cake 1">
        </div>
        <div class="col-9">
          <div class="card-body py-2">
            <h5 class="card-title text-dark-orange"><?= $item['product_name']; ?></h5>
            <small class="card-text text-light-orange"><?= $item['description']; ?></small>
            <div class="row">
              <div class="col my-auto">
                <h5 class="card-text text-dark-orange">Rp. <?= $item['price']; ?></h5>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  <?php endif; ?>
<?php endforeach; ?>