<div class="container my-2">
  <nav class="navbar bg-body-tertiary border-bottom border-dark">
    <div class="container-fluid">
      <span class="navbar-brand mb-0 h1 text-dark-orange fw-bold"><?= $title; ?></span>
    </div>
  </nav>

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
        <a href="<?= base_url('profile/edit'); ?>" class="btn btn-orange mt-3">Ubah</a>
        <a href="<?= base_url('login//logout'); ?>" class="btn btn-orange">Keluar</a>
      </div>
    </div>
  </section>
</div>