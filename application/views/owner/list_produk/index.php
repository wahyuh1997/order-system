<nav class="navbar bg-body-tertiary border-bottom border-dark mt-2">
  <div class="container-fluid">
    <h6 class="text-dark-orange"><?= $title; ?></h6>
    <div class="d-flex" role="navbar">
      <a href="<?= base_url('owner'); ?>" class="text-light-orange"><i class="fa-solid fa-house fa-xl"></i></a>
    </div>
  </div>
</nav>

<div class="container mt-2">
  <section class="text-center mt-5">
    <div class="row">
      <div class="col-6 fw-bold text-dark-orange">
        Status Penjualan
      </div>
      <div class="col-6 fw-bold text-dark-orange">
        Pre-Order ON
      </div>
    </div>
  </section>

  <section class="mt-3">
    <div class="card mb-3" style="max-width: 540px;">
      <div class="row g-0">
        <div class="col-3">
          <img src="<?= base_url('assets/img/cake 1.png'); ?>." class="img-fluid rounded-start" style="height: 100%;" alt="Cake 1">
        </div>
        <div class="col-9 align-items-center">
          <div class="card-body ps-1" style="height: 100%;">
            <div class="row mt-2">
              <div class="col-9">
                <h6 class="card-title text-dark-orange mb-0">Brownies Coklat</h6>
              </div>
              <div class="col-3 text-end">
                <h5 class="mb-0 text-dark-orange">4</h5>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="card mb-3" style="max-width: 540px;">
      <div class="row g-0">
        <div class="col-3">
          <img src="<?= base_url('assets/img/cake 1.png'); ?>." class="img-fluid rounded-start" style="height: 100%;" alt="Cake 1">
        </div>
        <div class="col-9 align-items-center">
          <div class="card-body ps-1" style="height: 100%;">
            <div class="row mt-2">
              <div class="col-9">
                <h6 class="card-title text-dark-orange mb-0">Cookies Topping Choco chip</h6>
              </div>
              <div class="col-3 text-end">
                <h5 class="mb-0 text-dark-orange">8</h5>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

</div>