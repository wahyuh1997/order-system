<div class="fixed-top" style="background-color: #F7F7F7;">
  <nav class="navbar bg-body-tertiary border-bottom border-dark mt-2">
    <div class="container-fluid">
      <h6 class="text-dark-orange"><?= $title; ?></h6>
      <div class="d-flex" role="navbar">
        <a href="<?= base_url('owner'); ?>" class="text-light-orange"><i class="fa-solid fa-house fa-xl"></i></a>
      </div>
    </div>
  </nav>

  <div class="container my-2">
    <label for="name" class="form-label text-light-orange">Tanggal Laporan</label>
    <input type="text" class="form-control daterange" data-start-date="<?= date('Y-m-01'); ?>" data-end-date="<?= date('Y-m-d'); ?>">
    <input type="hidden" id="start_date" value="<?= date('Y-m-01'); ?>">
    <input type="hidden" id="end_date" value="<?= date('Y-m-d'); ?>">

    <section class="mt-3">
      <div class="card">
        <div class="card-body">
          <div class="row mb-2">
            <div class="col-6">
              <h6 class="card-title text-dark-orange">Total Penjualan</h6>
              <small id="total-income" class="card-text text-light-orange">Rp. <?= currency_format($data['total_income']); ?></small>
            </div>
            <div class="col-6">
              <h6 class="card-title text-dark-orange">Pesanan Dibatalkan</h6>
              <small id="order-cancel" class="card-text text-light-orange"><?= currency_format($data['order_cancel'] + $data['order_failed']); ?></small>
            </div>
          </div>
          <div class="row">
            <div class="col-6">
              <h6 class="card-title text-dark-orange">Jumlah Penjualan</h6>
              <small id="order-success" class="card-text text-light-orange"><?= currency_format($data['order_success']); ?></small>
            </div>
            <div class="col-6">
              <h6 class="card-title text-dark-orange">Jumlah Produk</h6>
              <small id="total-product" class="card-text text-light-orange"><?= currency_format($data['total_product']); ?></small>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</div>

<div class="container" style="margin-top: 300px;">
  <div class="section mt-3">
    <div class="card">
      <div id="load-view" class="card-body text-center">
        <?php foreach ($data['order'] as $order) : ?>
          <!-- Loop Here -->
          <div class="row mb-3">
            <div class="col-2 my-auto p-0">
              <div class="card">
                <div class="card-body px-0 mx-auto"><i class="fa-solid fa-cart-shopping fa-2x text-light-orange"></i></div>
              </div>
            </div>
            <div class="col-6 text-dark-orange text-start">
              <h6 class="card-title mb-0">Pesanan <?= $order['order_number']; ?></h6>
              <small class="card-text d-block"><?= date('d-M-Y', strtotime($order['date'])); ?></small>
              <small class="card-text"><?= $order['nama']; ?></small>
            </div>
            <div class="col-4 text-dark-orange text-end">
              <h6 class="card-title mb-0">
                <?php switch ($order['status']) {
                  case '1':
                    $status = 'Selesai';
                    break;
                  default:
                    $status = 'Dibatalkan';
                    break;
                }; ?>
                <?= $status; ?>
              </h6>
              <small class="card-text">Rp. <?= currency_format($order['total_price']); ?></small>
            </div>
          </div>
        <?php endforeach; ?>

      </div>
    </div>
  </div>
</div>