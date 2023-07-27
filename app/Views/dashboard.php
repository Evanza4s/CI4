<div class="container">
  <!-- Layout wrapper -->
  <div class="layout-wrapper">
    <div class="layout-container">
      <!-- Menu -->

      <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
        <div class="app-brand demo">
          <a href="index.html" class="app-brand-link">
            <span class="app-brand-logo demo">

            </span>
            <span class="app-brand-text demo menu-text fw-bolder ms-2">admin</span>
          </a>

          <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
          </a>
        </div>

        <div class="menu-inner-shadow"></div>

        <ul class="menu-inner py-1">

          <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Menu</span>
          </li>

          <!--Berita-->
          <li class="menu-item ">
            <a href="/berita" class="menu-link">
              <i class="menu-icon tf-icons bx bxs-news"></i>
              <div data-i18n="Analytics">Berita</div>
            </a>
          </li>

          <!-- Tokoh Inspirasi -->
          <li class="menu-item">
            <a href="/kisah" class="menu-link">
              <i class='menu-icon tf-icons bx bx-group'></i>
              <div data-i18n="Analytics">Tokoh Inspirasi</div>
            </a>
          </li>


        </ul>
      </aside>
      <!-- / Menu -->

      <!-- Layout container -->
      <div class="layout-page">

        <!-- Content wrapper -->
        <div class="content-wrapper">
          <!-- Content -->

          <div class="row">
            <div class="col-12">
              <h1>Hello, <?= session()->get('firstname') ?></h1>
            </div>
          </div>
        </div>

        <!-- / Content -->


        <div class="content-backdrop fade"></div>
      </div>

    </div>
    <!-- / Layout page -->
  </div>

  <!-- Overlay -->
  <div class="layout-overlay layout-menu-toggle"></div>
</div>
<!-- / Layout wrapper -->