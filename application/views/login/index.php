<!-- As a heading -->
<div class="container mt-2">
  <nav class="navbar bg-body-tertiary border-bottom border-dark">
    <div class="container-fluid">
      <span class="navbar-brand mb-0 h1 text-dark-orange fw-bold">Masuk</span>
    </div>
  </nav>


  <section>
    <div class="text-center" style="margin-top: 10em; position: relative;">
      <img src="<?= base_url('assets/img/google.png'); ?>" width="200" height="60" alt="Google Img">
      <h5 class="text-secondary mt-2">Masuk</h5>
    </div>
  </section>

  <section class="d-grid gap-2 mt-5">
    <a href="<?= $google_url; ?>" class="btn btn-light text-center border border-dark" name="code"><i class="fa-brands fa-google text-primary"></i> Sign in with Google</a>
  </section>

</div>