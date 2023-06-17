<nav class="navbar bg-body-tertiary border-bottom border-dark mt-2">
  <div class="container-fluid">
    <div class="fw-bold" role="navbar">
      <a href="<?= base_url('profile'); ?>" class="text-light-orange d-inline me-3"><i class="fa-solid fa-arrow-left"></i></a>
      <h6 class="d-inline-block text-dark-orange"><?= $title; ?></h6>
    </div>
  </div>
</nav>

<div class="container my-2">
  <section class="mt-4">
    <form id="regCrudForm" data-redurl="<?= base_url('profile'); ?>" method="post">
      <div class="card-profile text-center">
        <img src="<?= $_SESSION['os_user']['picture']; ?>" alt="" class="rounded-circle" style="margin-top: 3em;">

        <div class="mb-3 text-start px-3">
          <label class="form-label fw-bold text-dark-orange">Nama <span class="text-danger">*</span></label>
          <input type="text" class="form-control" name="nama" value="<?= $_SESSION['os_user']['nama']; ?>" required>
        </div>
        <div class="mb-3 text-start px-3">
          <label class="form-label fw-bold text-dark-orange">No. Telepon <span class="text-danger">*</span></label>
          <input type="text" class="form-control phone" name="no_telepon" value="<?= $_SESSION['os_user']['phone']; ?>" required>
        </div>

        <div class="d-grid gap-2 mt-5 px-3">
          <button class="btn btn-orange">Simpan</button>
        </div>
      </div>
    </form>
  </section>
</div>