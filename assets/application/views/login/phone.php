<!-- As a heading -->
<div class="container mt-2">
  <nav class="navbar bg-body-tertiary border-bottom border-dark">
    <div class="container-fluid">
      <span class="navbar-brand mb-0 h1 text-dark-orange fw-bold">Masuk</span>
    </div>
  </nav>


  <section class="mt-5">
    <form id="regCrudForm" data-redurl="<?= base_url(); ?>" method="post">
      <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label text-dark-orange h5">Nomor WhatsApp</label>
        <input type="text" min="0" minlength="11" maxlength="13" class="form-control phone" name="no_telepon">
        <div class="form-text text-dark-orange">Masukan nomer telephone dengan benar, untuk penjual menghubungi jika pesanan sudah siap diambil.
        </div>
      </div>

      <div class="d-grid gap-2">
        <button class="btn btn-orange" type="submit" disabled>Masuk</button>
      </div>
    </form>
  </section>

</div>