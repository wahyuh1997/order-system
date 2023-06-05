<nav class="navbar bg-body-tertiary border-bottom border-dark mt-2">
  <div class="container-fluid">
    <div class="fw-bold" role="search">
      <h6 class="d-inline-block text-dark-orange"><?= $title; ?></h6>
    </div>
  </div>
</nav>

<div class="container mt-2">
  <section class="mt-4">
    <div class="card-profile text-center border-0">
      <img src="<?= base_url('assets/img/user.png'); ?>" alt="" style="margin-top: 3em;">

      <div class="mb-3 text-start px-3">
        <label class="form-label fw-bold text-dark-orange">Nama Pengguna</label>
        <input type="text" class="form-control" value="Najmah Frithadila">
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