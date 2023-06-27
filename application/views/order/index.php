<div class="container my-2">
  <nav class="navbar bg-body-tertiary border-bottom border-dark">
    <div class="container-fluid">
      <span class="navbar-brand mb-0 h1 text-dark-orange fw-bold">Pesanan Saya</span>
    </div>
  </nav>

  <nav>
    <div class="nav nav-underline nav-justified mt-2" id="nav-tab" role="tablist">
      <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Proses</button>
      <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Riwayat</button>
    </div>
  </nav>
  <div class="tab-content" id="nav-tabContent">
    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0" style="position: relative;">
      <?php if (count($data_process) > 0) : ?>
        <?php foreach ($data_process as $process) : ?>
          <?php
          switch ($process['status']) {
            case '0':
              $status_process = 'Menunggu Pembayaran';
              $link = base_url('order/payment/' . $process['id']);
              break;
            case '2':
              $status_process = 'Process';
              $link = base_url('order/confirm/' . $process['id']);
              break;
            default:
              $status_process = 'Menunggu Konfirmasi Restoran';
              $link = base_url('order/confirm/' . $process['id']);
              break;
          }; ?>
          <a href="<?= $link; ?>" class="text-decoration-none">
            <div class="card mt-3" style="box-shadow: 1px 2px #181818;">
              <div class="row g-0 text-light-orange">
                <div class="col-3 text-center my-auto">
                  <i class="fa-solid fa-cart-shopping fa-3x"></i>
                </div>
                <div class="col-9">
                  <div class="card-body">
                    <h6 class="card-title mb-0">Pesanan <?= $process['order_number']; ?></h6>
                    <small class="card-text"><?= $status_process; ?></small>
                  </div>
                </div>
              </div>
            </div>
          </a>
        <?php endforeach; ?>
      <?php else : ?>
        <p class="mt-5 text-dark-orange fw-bold text-center">
          Tidak ada pesanan, silahkan melakukan pemasanan.
        </p>
      <?php endif; ?>
    </div>
    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab" tabindex="0">
      <?php if (count($data_history) > 0) : ?>
        <?php foreach ($data_history as $history) : ?>
          <?php
          switch ($history['status']) {
            case '1':
              $status_history = 'Selesai';
              break;
            default:
              $status_history = 'Dibatalkan';
              break;
          }; ?>
          <a href="<?= base_url('order/confirm/' . $history['id']); ?>" class="text-decoration-none">
            <div class="card mt-3" style="box-shadow: 1px 2px #181818;">
              <div class="row g-0 text-light-orange">
                <div class="col-3 text-center my-auto">
                  <i class="fa-solid fa-cart-shopping fa-3x"></i>
                </div>
                <div class="col-9">
                  <div class="card-body">
                    <h6 class="card-title mb-0">Pesanan <?= $history['order_number']; ?></h6>
                    <small class="card-text"><?= $status_history; ?></small>
                  </div>
                </div>
              </div>
            </div>
          </a>
        <?php endforeach; ?>
      <?php else : ?>
        <p class="mt-5 text-dark-orange fw-bold text-center">
          Tidak ada pesanan, silahkan melakukan pemasanan.
        </p>
      <?php endif; ?>
    </div>
  </div>
</div>