<div class="container my-2">
  <nav class="navbar bg-body-tertiary border-bottom border-dark">
    <div class="container-fluid">
      <span class="navbar-brand mb-0 h1 text-dark-orange fw-bold"><?= $title; ?></span>
    </div>
  </nav>

  <section class="mt-4">
    <div class="card-profile text-center">
      <img src="<?= base_url('assets/img/user.png'); ?>" alt="" style="margin-top: 3em;">

      <div class="mb-3 text-start px-3">
        <label class="form-label fw-bold text-dark-orange">Nama</label>
        <input type="text" class="form-control" value="">
      </div>
      <div class="mb-3 text-start px-3">
        <label class="form-label fw-bold text-dark-orange">No. Telepon</label>
        <input type="text" class="form-control phone" value="0812974683900">
      </div>

      <div class="d-grid gap-2 mt-5 px-3">
        <button class="btn btn-orange">Simpan</button>
      </div>
    </div>
  </section>
</div>