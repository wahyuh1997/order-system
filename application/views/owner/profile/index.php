<nav class="navbar bg-body-tertiary border-bottom border-dark mt-2">
  <div class="container-fluid">
    <h6 class="text-dark-orange"><?= $title; ?></h6>
    <div class="d-flex" role="navbar">
      <a href="<?= base_url('owner'); ?>" class="text-light-orange"><i class="fa-solid fa-house fa-xl"></i></a>
    </div>
  </div>
</nav>

<div class="container my-2">
  <section class="mt-4">
    <div class="card-profile text-center">
      <img src="<?= base_url('assets/img/user.png'); ?>" alt="" style="margin-top: 3em;">

      <div class="mb-3">
        <label class="form-label fw-bold text-dark-orange mb-1">Nama</label>
        <p class="mb-0 text-dark-orange">Najmah Frithadila</p>
      </div>
      <div class="mb-3">
        <label class="form-label fw-bold text-dark-orange mb-1">No. Telepon</label>
        <p class="mb-0 text-dark-orange">0812974683900</p>
      </div>

      <div class="d-grid gap-2 mt-4 px-3">
        <a href="<?= base_url('owner/profile/edit'); ?>" class="btn btn-orange mt-3">Ubah</a>
        <button class="btn btn-orange">Keluar</button>
      </div>
    </div>
  </section>
</div>