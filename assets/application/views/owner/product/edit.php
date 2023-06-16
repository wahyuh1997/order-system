<nav class="navbar bg-body-tertiary border-bottom border-dark mt-2">
  <div class="container-fluid">
    <div class="fw-bold" role="search">
      <a href="<?= base_url('owner/product'); ?>" class="text-light-orange d-inline me-3"><i class="fa-solid fa-arrow-left"></i></a>
      <h6 class="d-inline-block text-dark-orange"><?= $title; ?></h6>
    </div>
  </div>
</nav>

<div class="container my-2">
  <section>
    <div class="h4 text-dark-orange">
      Detail Produk
    </div>
  </section>

  <form id="regCrudForm" data-redurl="<?= base_url('owner/product'); ?>" method="post">
    <section>
      <div class="mb-3">
        <label for="product_name" class="form-label text-light-orange">Nama Produk</label>
        <input type="text" class="form-control" id="product_name" name="product_name" value="<?= $data['product_name']; ?>">
      </div>
      <div class="mb-3">
        <label for="description" class="form-label text-light-orange">Deskripsi</label>
        <textarea class="form-control" rows="3" id="description" name="description"><?= $data['description']; ?></textarea>
      </div>
      <div class="mb-3">
        <label for="name" class="form-label text-light-orange">Harga Produk</label>
        <div class="input-group mb-3">
          <span class="input-group-text" id="basic-addon1">Rp</span>
          <input type="number" class="form-control" min="0" name="price" value="<?= $data['price']; ?>">
        </div>
      </div>
      <div class="mb-3">
        <label for="name" class="form-label text-light-orange">Gambar Produk</label>
        <input class="form-control form-control-sm upd-image" id="formFile" type="file" accept="image/*">
        <img class="mt-2 mr-2 pic" src="<?= base_url('assets/img/product/' . $data['image']); ?>" style="width: 100%; display: block; height: 150px; cursor: pointer;">
        <input type="hidden" name="tmp_image" value="<?= $data['image']; ?>">
        <a href="#" class="btn btn-sm btn-danger del-image d-grid gap-2 mt-2">Hapus Gambar</a>
      </div>
      <div class="mb-3">
        <label for="name" class="form-label text-light-orange">Ketersediaan</label>
        <div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="is_available" id="inlineRadio1" value="1" <?= $data['is_available'] == 1 ? 'checked' : ''; ?>>
            <label class="form-check-label text-dark-orange" for="inlineRadio1">Tersedia</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="is_available" id="inlineRadio2" value="0" <?= $data['is_available'] == 0 ? 'checked' : ''; ?>>
            <label class="form-check-label text-dark-orange" for="inlineRadio2">Kosong</label>
          </div>
        </div>
      </div>
    </section>

    <section class="mt-5">
      <div class="row">
        <div class="col-6">
          <div class="d-grid gap-2">
            <a href="" class="btn btn-secondary">Batal</a>
          </div>
        </div>
        <div class="col-6">
          <div class="d-grid gap-2">
            <button type="submit" class="btn btn-orange">Simpan</button>
          </div>
        </div>
      </div>
    </section>
  </form>
</div>