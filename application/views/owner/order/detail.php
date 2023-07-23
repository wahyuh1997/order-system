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
  <section class="mt-5">
    <h5 class="<?= $data['status'] == 4 ? 'text-danger' : 'text-dark-orange'; ?> mb-5">
      <?php switch ($data['status']) {
        case '3':
          $status = 'Pesanan Baru !';
          $type = 'process';
          break;
        case '2':
          $status = 'Pesanan sedang diproses!';
          $type = 'history';
          break;
        case '4':
          $status = 'Pesanan Dibatalkan !';
          $type = 'history';
          break;
        default:
          $status = 'Pesanan selesai!';
          $type = 'history';
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
          <div class="row g-0 mb-2">
            <div class="col-3 p-1">
              <img src="<?= $item['image'] == null ? base_url('assets/img/no-image.png') : base_url('assets/img/product/') . $item['image']; ?>" class="img-fluid" style="width: 100%; height: 6rem;" alt="Cake 1">
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

  <section class="mt-3">
    <div>
      <div class="row">
        <div class="col-12">
          <label for="formFile" class="col-form-label text-dark-orange d-block">Bukti Pembayaran</label>
          <img src="<?= base_url('assets/img/payment/' . $data['payment']); ?>" class="img-thumbnail img-payment" style="height: 13em; cursor: pointer;">
        </div>
      </div>
    </div>
  </section>
  <!-- Order Button -->
  <form id="regCrudForm" data-redurl="<?= base_url('owner/order/index/' . $type); ?>" method="post">
    <input type="hidden" name="order_id" value="<?= $data['id']; ?>">
    <input type="hidden" name="type" value="">

    <section id="view-desc-cancel" class="mt-3" <?= $data['status'] == 4 ? '' : 'style="display: none;"'; ?>>
      <div class="row">
        <div class="col-12">
          <label for="" class="text-dark-orange">Deskripsi Pembatalan Pesanan</label>
          <textarea name="desc" id="desc" class="form-control" cols="30" rows="3" <?= $data['status'] == 4 ? 'readonly' : ''; ?>><?= $data['desc']; ?></textarea>
        </div>
      </div>
    </section>



    <?php if ($data['status'] == '3') : ?>
      <section class="mt-5 mb-3">
        <div id="confirm-section" class="d-grid gap-2">
          <button type="submit" id="btn-confirm" name="confirm" class="btn btn-orange" onclick="actionButton('confirm')" data-text="Anda yakin ingin konfirmasi pesanan ini ?">Konfirmasi</button>
          <button type="button" id="btn-cancel-order" class="btn btn-secondary">Batalkan Pesanan</button>
        </div>
        <div id="cancel-section" class="d-grid gap-2 d-none">
          <button type="submit" id="btn-cancel" name="cancel" class="btn btn-orange" onclick="actionButton('cancel')" disabled>Simpan</button>
        </div>
      </section>
    <?php elseif ($data['status'] == '2') : ?>
      <section class="d-grid gap-2 mt-4 mb-3">
        <button type="submit" id="btn-finish" name="confirm" class="btn btn-orange" onclick="actionButton('finish')" data-text="Anda yakin pesanan telah selesai ?" data-redurl='<?= base_url('owner/order/index/history'); ?>'>Pesanan Selesai</button>
      </section>
    <?php elseif ($data['status'] == '1' || $data['status'] == '4' || $data['status'] == '5') : ?>
      <section class="d-grid gap-2 mt-5 mb-3">
        <a href="<?= base_url('owner/order/delete/' . $data['id']); ?>" class="btn btn-orange del-sel" data-text="Apakah anda yakin akan mengapus pesanan ini ?" data-redurl='<?= base_url('owner/order/index/history'); ?>'>Hapus Pesanan Selesai</a>
      </section>
    <?php endif; ?>
  </form>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Bukti Pembayaran</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>