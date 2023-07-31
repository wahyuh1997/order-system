<footer class="fixed-bottom">
  <ul class="nav app-bar justify-content-around align-items-end pt-3" style="height: 100%;">
    <li class="nav-item">
      <a href="<?= base_url(''); ?>" class="nav-link d-flex flex-column text-center icon-menu <?= $this->uri->segment(1) == '' ? 'active' : null; ?>">
        <i class="fa-solid fa-utensils fa-2xl"></i>
        <span class="mt-3">Menu</span>
      </a>
    </li>
    <li class="nav-item">
      <span class="badge badge-pill load-total-message"></span>
      <a href="<?= base_url('order'); ?>" class="nav-link d-flex flex-column align-items-center icon-menu <?= $this->uri->segment(1) == 'order' ? 'active' : null; ?>" href="<?= base_url('order'); ?>">
        <i class="fa-solid fa-cart-shopping fa-2xl"></i>
        <span class="mt-3">Pesanan</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link d-flex flex-column align-items-center icon-menu <?= $this->uri->segment(1) == 'profile' ? 'active' : null; ?>" href="<?= base_url('profile'); ?>">
        <i class="fa-solid fa-user fa-2xl"></i>
        <span class="mt-3"><?= isset($_SESSION['os_user']) ? 'Profil' : 'Login'; ?></span>
      </a>
    </li>
  </ul>
</footer>