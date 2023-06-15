<nav class="navbar bg-body-tertiary border-bottom border-dark mt-2">
  <div class="container-fluid">
    <div class="fw-bold" role="search">
      <a href="<?= base_url('owner/order'); ?>" class="text-light-orange d-inline me-3"><i class="fa-solid fa-arrow-left"></i></a>
      <h6 class="d-inline-block text-dark-orange"><?= $title; ?></h6>
    </div>
  </div>
</nav>

<div class="container my-2">
  <!-- Info Product -->
  <section class="mt-3">
    <h5 class="text-dark-orange mb-4">
      <?php switch ($data['status']) {
        case '3':
          $status = 'Pesanan Baru !';
          break;
        case '2':
          $status = 'Pesanan sedang diproses!';
          break;
        default:
          $status = 'Pesanan selesai!';
          break;
      }; ?>
      <?= $status; ?>
    </h5>
    <div class="card">
      <div class="card-body text-dark-orange py-2">
        <div>
          <p class="mb-0 fw-bold">Tanggal Pesanan</p>
          <span class="ms-3"><?= date('d/m/Y', strtotime($data['date'])); ?></span>
        </div>
        <div>
          <p class="mb-0 fw-bold">Nama Pemesan</p>
          <span class="ms-3"><?= $user['nama']; ?></span>
        </div>
        <div>
          <p class="mb-0 fw-bold">No Telepon</p>
          <span class="ms-3"><?= $user['no_telepon']; ?></span>
        </div>
      </div>
    </div>
  </section>
  <!-- End Of info Product -->

  <!-- Ringkasan Pesanan -->
  <section class="mt-3">
    <h6 class="text-dark-orange">Pesanan</h6>

    <?php foreach ($data['order_detail'] as $item) : ?>
      <div class="card border-0">
        <div class="card-body p-0">
          <div class="row g-0 border-bottom mb-2">
            <div class="col-3">
              <img src="<?= $item['image'] == null ? base_url('assets/img/no-image.png') : base_url('assets/img/product/') . $item['image']; ?>" class="img-fluid" style="width: 100%; max-height: 88px;" alt="Cake 1">
            </div>
            <div class="col-9">
              <div class="card-body py-2">
                <h6 class="card-title text-dark-orange">Brownies Coklat</h6>
                <div class="row">
                  <div class="col-5 my-auto">
                    <h6 class="card-text text-dark-orange">x<?= $item['item']; ?></h6>
                  </div>
                  <div class="col-7 text-dark-orange text-end">
                    Rp. <?= number_format($item['price'], 0, ',', '.'); ?>
                  </div>

                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    <?php
      $total_price[] = $item['price_total'];
    endforeach; ?>
  </section>

  <!-- Payment Info -->
  <section class="mt-3">
    <p class="mb-0 text-dark-orange">Rincian Pembayaran</p>
    <div class="card">
      <div class="card-body text-dark-orange">
        <div class="row">
          <div class="col-6">
            Total Pembayaran
          </div>
          <div class="col-6 text-end">
            Rp. <?= number_format(array_sum($total_price), 0, ',', '.'); ?>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="mt-3">
    <div>
      <div class="row">
        <div class="col-12">
          <label for="formFile" class="col-form-label text-dark-orange d-block">Bukti Pembayaran</label>
          <img src="<?= base_url('assets/img/payment/' . $data['payment']); ?>" class="img-thumbnail" style="height: 13em;">
        </div>
      </div>
    </div>
  </section>

  <!-- Order Button -->
  <form id="regCrudForm" data-redurl="<?= base_url('owner/order'); ?>" method="post">
    <input type="hidden" name="order_id" value="<?= $data['id']; ?>">
    <input type="hidden" name="type" value="">

    <?php if ($data['status'] == '3') : ?>
      <section class="d-grid gap-2 mt-5 mb-3">
        <button type="submit" name="confirm" class="btn btn-orange" onclick="actionButton('confirm')" data-redurl='<?= base_url('owner/order/index/process'); ?>'>Konfirmasi</button>
        <button type="submit" name="cancel" class="btn btn-secondary" onclick="actionButton('cancel')" data-redurl='<?= base_url('owner/order/index/history'); ?>'>Batalkan Pesanan</button>
      </section>
    <?php elseif ($data['status'] == '2') : ?>
      <section class="d-grid gap-2 mt-5 mb-3">
        <button type="submit" name="confirm" class="btn btn-orange" onclick="actionButton('finish')" data-redurl='<?= base_url('owner/order/index/history'); ?>'>Pesanan Selesai</button>
      </section>
    <?php endif; ?>
  </form>
</div>