<nav class="navbar bg-body-tertiary border-bottom border-dark mt-2">
  <div class="container-fluid">
    <div class="fw-bold" role="search">
      <h6 class="d-inline-block text-dark-orange"><?= $title; ?></h6>
    </div>
  </div>
</nav>

<?php if ($this->session->flashdata('alert-failed')) : ?>
  <div class="alert-failed" data-title="<?= $this->session->flashdata('alert-failed'); ?>"></div>
<?php endif; ?>

<div class="container mt-2">
  <form id="regLogForm" data-redurl="<?= base_url('owner'); ?>" method="post">
    <section class="mt-4">
      <div class="card-profile text-center border-0">
        <img src="<?= base_url('assets/img/user.png'); ?>" alt="" style="margin-top: 3em;">

        <div class="mb-3 text-start px-3">
          <label class="form-label fw-bold text-dark-orange">Nama Pengguna</label>
          <input type="text" class="form-control" name="user_name" value="">
        </div>
        <div class="mb-3 text-start px-3">
          <label class="form-label fw-bold text-dark-orange">Kata Sandi</label>
          <div class="d-flex align-items-center">
            <input type="password" class="form-control" id="password" name="password">
            <i class="fa-solid fa-eye-slash" id="togglePassword"></i>
          </div>

        </div>

        <div class="d-grid gap-2 mt-5 px-3">
          <button type="submit" class="btn btn-orange">Masuk</button>
        </div>
      </div>
    </section>
  </form>
</div>