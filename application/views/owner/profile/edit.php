<nav class="navbar bg-body-tertiary border-bottom border-dark mt-2">
  <div class="container-fluid">
    <div class="fw-bold" role="navbar">
      <a href="<?= base_url('owner/profile'); ?>" class="text-light-orange d-inline me-3"><i class="fa-solid fa-arrow-left"></i></a>
      <h6 class="d-inline-block text-dark-orange"><?= $title; ?></h6>
    </div>
  </div>
</nav>

<div class="container my-2">
  <section class="mt-4">
    <div class="card-profile text-center" style="height: 40em;">
      <img src="<?= base_url('assets/img/user.png'); ?>" alt="" style="margin-top: 3em;">

      <div class="mb-3 text-start px-3">
        <label class="form-label fw-bold text-dark-orange">Nama</label>
        <input type="text" class="form-control" value="Najmah Frithadila">
      </div>
      <div class="mb-3 text-start px-3">
        <label class="form-label fw-bold text-dark-orange">No. Telepon</label>
        <input type="text" class="form-control phone" value="0812974683900">
      </div>
      <div class="mb-3 text-start px-3">
        <label class="form-label fw-bold text-dark-orange">Nama Pengguna</label>
        <input type="text" class="form-control" value="Najmah_Frithadila">
      </div>
      <div class="mb-3 text-start px-3">
        <label class="form-label fw-bold text-dark-orange">Kata Sandi</label>
        <div class="d-flex align-items-center">
          <input type="password" class="form-control" id="password">
          <i class="fa-solid fa-eye-slash" id="togglePassword"></i>
        </div>
      </div>

      <div class="d-grid gap-2 mt-5 px-3">
        <button class="btn btn-orange">Simpan</button>
      </div>
    </div>
  </section>
</div>