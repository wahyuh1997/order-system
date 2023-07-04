<?php foreach ($order as $order) : ?>
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