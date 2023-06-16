<nav class="navbar bg-body-tertiary border-bottom border-dark mt-2">
  <div class="container-fluid">
    <div class="fw-bold" role="search">
      <a href="<?= base_url('order'); ?>" class="text-light-orange d-inline me-3"><i class="fa-solid fa-arrow-left"></i></a>
      <h6 class="d-inline-block text-dark-orange"><?= $title; ?></h6>
    </div>
  </div>
</nav>

<div class="container my-2">
  <!-- Info Product -->
  <section class="mt-3">
    <h6 class="text-dark-orange">Informasi Produk</h6>
    <div class="card">
      <div class="card-body text-dark-orange py-2">
        <div>
          <p class="mb-0 fw-bold">Tanggal Pesanan</p>
          <span class="ms-3"><?= date('d/m/Y', strtotime($data['date'])); ?></span>
        </div>
        <div>
          <p class="mb-0 fw-bold">Estimasi Pre-Order</p>
          <span class="ms-3">3 Hari (setelah pesanan dikonfirmasi)</span>
        </div>
        <div>
          <p class="mb-0 fw-bold">Layanan Pesanan</p>
          <span class="ms-3">Mengambil Pesanan Sendiri</span>
        </div>
      </div>
    </div>
  </section>
  <!-- End Of info Product -->

  <!-- Status Order -->
  <section class="mt-3">
    <h6 class="text-dark-orange">Status Pesanan</h6>
    <?php if ($data['status'] < 4) : ?>
      <div class="row">
        <div class="col-2">
          <i class="fa-solid fa-receipt fa-2x active"></i>
        </div>
        <div class="col-3">
          <div style="border-top: 3px solid black; margin-top: 1rem;"></div>
        </div>
        <div class="col-2">
          <i class="fa-solid fa-fire-burner fa-2x <?= $data['status'] == 1 || $data['status'] == 2 ? 'active' : null; ?>"></i>
        </div>
        <div class="col-3">
          <div style="border-top: 3px solid black; margin-top: 1rem;"></div>
        </div>
        <div class="col-2">
          <i class="fa-solid fa-circle-check fa-2x <?= $data['status'] == 1 ? 'active' : null; ?>"></i>
        </div>
      </div>
    <?php else : ?>
      <h5 class="text-danger mb-0">Pesanan Dibatalkan</h5>
    <?php endif; ?>
    <small class="<?= $data['status'] < 4 ? 'text-dark-orange' : 'text-danger'; ?> mt-1">
      <?php switch ($data['status']) {
        case '1':
          $status = 'Pesanan telah selesai! Silakan ambil pesanan anda!';
          break;
        case '2':
          $status = 'Restoran sedang memproses pesanan anda!';
          break;
        case '3':
          $status = 'Menunggu restoran mengkonfirmasi pesanan anda!';
          break;
        default:
          $status = 'Pesanan anda dibatalkan karena produk tidak tersedia';
          # code...
          break;
      }; ?>
      <?= $status; ?>
    </small>
  </section>
  <!-- End Of Status -->

  <!-- Ringkasan Pesanan -->
  <section class="mt-3">
    <h6 class="text-dark-orange">Pesanan</h6>
    <?php foreach ($data['order_detail'] as $item) : ?>
      <div class="card border-0">
        <div class="card-body p-0">
          <div class="row g-0 border-bottom mb-2">
            <div class="col-3">
              <img src="<?= $item['image'] == null ? base_url('assets/img/no-image.png') : base_url('assets/img/product/') . $item['image']; ?>" class="img-fluid rounded-start" style="width: 100%;" height="70" alt="Cake 1">
            </div>
            <div class="col-9">
              <div class="card-body py-2">
                <h6 class="card-title text-dark-orange"><?= $item['product_name']; ?></h6>
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

  <form method="post" enctype="multipart/form-data">

    <?php if ($data['status'] == 3) : ?>
      <section>
        <div class="mt-3">
          <label for="formFile" class="text-dark-orange">Bukti Pembayaran</label>
          <input class="form-control form-control-sm upd-image" name="image" id="formFile" type="file" accept="image/*">
        </div>
      </section>
    <?php elseif ($data['status'] == 2) : ?>
      <section>
        <div class="mt-3">
          <label for="formFile" class="text-dark-orange d-block">Bukti Pembayaran</label>
          <img src="<?= base_url('assets/img/payment/' . $data['payment']); ?>" class="img-thumbnail" style="height: 13em;">
        </div>
      </section>
    <?php endif; ?>

    <!-- Order Button -->
    <section class="d-grid gap-2 mt-4">
      <button type="submit" class="btn btn-orange btn-submit d-none">Simpan</button>
      <a href="https://api.whatsapp.com/send?phone=<?= $wa_phone; ?>" target="_blank" class="btn btn-orange btn-wa">Hubungi Penjual via WhatsApp</a>
    </section>
  </form>
</div>