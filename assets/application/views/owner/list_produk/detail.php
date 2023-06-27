<nav class="navbar bg-body-tertiary border-bottom border-dark mt-2">
  <div class="container-fluid">
    <div class="fw-bold" role="navbar">
      <a href="<?= base_url('owner/list_produk'); ?>" class="text-light-orange d-inline me-3"><i class="fa-solid fa-arrow-left"></i></a>
      <h6 class="d-inline-block text-dark-orange"><?= $title; ?></h6>
    </div>
  </div>
</nav>

<div class="container my-2">
  <section class="mt-3">
    <?php foreach ($data['user'] as $user) : ?>
      <div class="card mb-3">
        <div class="card-body ps-1" style="height: 100%;">
          <div class="row mt-1">
            <div class="col-9 text-light-orange">
              <h6 class="card-title mb-0"><?= $user['nama']; ?></h6>
              <p class="mb-0">Pesanan <?= $user['order_number']; ?></p>
            </div>
            <div class="col-3 text-end">
              <h5 class="mb-0 text-light-orange"><?= $user['item']; ?></h5>
            </div>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </section>

</div>