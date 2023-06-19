<div class="main-header fixed-top" style="background-color: #F7F7F7;">
  <nav class="navbar bg-body-tertiary border-bottom border-dark mt-2">
    <div class="container-fluid">
      <h6 class="text-dark-orange"><?= $title; ?></h6>
      <div class="d-flex" role="navbar">
        <a href="<?= base_url('owner'); ?>" class="text-light-orange"><i class="fa-solid fa-house fa-xl"></i></a>
      </div>
    </div>
  </nav>
  <nav>
    <div class="nav nav-underline nav-justified mt-2" id="nav-tab" role="tablist">
      <button class="nav-link <?= $type == null ? 'active' : null; ?>" id="nav-new-tab" data-bs-toggle="tab" data-bs-target="#nav-new" type="button" role="tab" aria-controls="nav-new" aria-selected="true">Pesanan Baru</button>
      <button class="nav-link <?= $type == 'process' ? 'active' : null; ?>" id="nav-order-tab" data-bs-toggle="tab" data-bs-target="#nav-order" type="button" role="tab" aria-controls="nav-order" aria-selected="false">Proses</button>
      <button class="nav-link <?= $type == 'history' ? 'active' : null; ?>" id="nav-complete-tab" data-bs-toggle="tab" data-bs-target="#nav-complete" type="button" role="tab" aria-controls="nav-complete" aria-selected="false">Selesai</button>
    </div>
  </nav>

  <div class="row mt-2 px-3 btn-group-area" <?= $this->uri->segment(4) != 'history' ? 'style="display: none;"' : ''; ?>>
    <div class="col-12 button-select text-end">
      <button type="button" class="btn btn-sm btn-primary btn-select">Pilih Pesanan</button>
    </div>
    <div class="col-12 button-area text-end" style="display: none;">
      <button type="button" class="btn btn-sm btn-danger btn-delete">Hapus Pesanan</button>
      <button type="button" class="btn btn-sm btn-secondary btn-tutup">Tutup</button>
    </div>
  </div>
</div>

<div class="container" style="margin-top: 140px;">
  <div class="tab-content" id="nav-tabContent">
    <div class="tab-pane fade <?= $type == null ? 'active show' : null; ?>" id="nav-new" role="tabpanel" aria-labelledby="nav-new-tab" tabindex="0" style="position: relative;">
      <?php if (count($new_data) > 0) : ?>
        <?php foreach ($new_data as $new) : ?>
          <a href="<?= base_url('owner/order/detail/' . $new['id']); ?>" class="text-decoration-none">
            <div class="card mt-3" style="max-width: 540px; box-shadow: 1px 2px #181818;">
              <div class="card-body">
                <div class="row g-0 text-light-orange">
                  <div class="col-3 text-center my-auto">
                    <i class="fa-solid fa-cart-shopping fa-3x"></i>
                  </div>
                  <div class="col-9">
                    <div class="card-body">
                      <h6 class="card-title mb-0">Pesanan <?= $new['order_number']; ?></h6>
                      <!-- <small class="card-text">Proses</small> -->
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

    </div>
    <div class="tab-pane fade <?= $type == 'process' ? 'active show' : null; ?>" id="nav-order" role="tabpanel" aria-labelledby="nav-order-tab" tabindex="0">
      <?php if (count($process_data) > 0) : ?>
        <?php foreach ($process_data as $process) : ?>
          <a href="<?= base_url('owner/order/detail/' . $process['id']); ?>" class="text-decoration-none">
            <div class="card mt-3" style="max-width: 540px; box-shadow: 1px 2px #181818;">
              <div class="card-body">
                <div class="row g-0 text-light-orange">
                  <div class="col-3 text-center my-auto">
                    <i class="fa-solid fa-cart-shopping fa-3x"></i>
                  </div>
                  <div class="col-9">
                    <div class="card-body">
                      <h6 class="card-title mb-0">Pesanan <?= $process['order_number']; ?></h6>
                      <!-- <small class="card-text">Proses</small> -->
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
    </div>
    <div class="tab-pane fade <?= $type == 'history' ? 'active show' : null; ?>" id="nav-complete" role="tabpanel" aria-labelledby="nav-complete-tab" tabindex="0">
      <?php if (count($history_data) > 0) : ?>
        <?php foreach ($history_data as $history) : ?>
          <div class="row">
            <div class="col">
              <a href="<?= base_url('owner/order/detail/' . $history['id']); ?>" class="card-select text-decoration-none">
                <div class="card mt-3" style="max-width: 540px; box-shadow: 1px 2px #181818;">
                  <div class="card-body">
                    <div class="row g-0 text-light-orange">
                      <div class="col-3 text-center my-auto">
                        <i class="fa-solid fa-cart-shopping fa-3x"></i>
                      </div>
                      <div class="col-9">
                        <div class="card-body <?= $history['status'] == 5 | $history['status'] == 4 ? 'text-danger' : null; ?>">
                          <h6 class="card-title mb-0">Pesanan <?= $history['order_number']; ?></h6>
                          <small class="card-text">
                            <?= $history['status'] == 1 ? 'Selesai' : 'Dibatalkan'; ?>
                          </small>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </a>
            </div>
            <div class="col-2 my-auto text-end checked-view d-none">
              <div class="form-check fs-3">
                <input class="form-check-input" type="checkbox" data-id="<?= $history['id']; ?>" value="">
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      <?php else : ?>
        <p class="mt-5 text-dark-orange fw-bold text-center">
          Tidak ada pesanan.
        </p>
      <?php endif; ?>
    </div>
  </div>
</div>