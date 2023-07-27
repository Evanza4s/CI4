<!-- Layout wrapper -->
<div class="layout-wrapper">
    <div class="layout-container">
        <!-- Menu -->

        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
            <div class="app-brand demo">
                <a href="/dashboard" class="app-brand-link">
                    <span class="app-brand-logo demo">

                    </span>
                    <span class="app-brand-text demo menu-text fw-bolder ms-2">admin</span>
                </a>

                <a href="/dashboard" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
                    <i class="bx bx-chevron-left bx-sm align-middle"></i>
                </a>
            </div>

            <div class="menu-inner-shadow"></div>

            <ul class="menu-inner py-1">

                <li class="menu-header small text-uppercase">
                    <span class="menu-header-text">Menu</span>
                </li>

                <!--Berita-->
                <li class="menu-item active">
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

                <div class="container mt-5">
                    <div class="card">
                        <h5 class="card-header">Berita</h5>
                        <div class=" col-12 col-sm-4">
                            <a href="<?= base_url('tambah') ?>" class="btn btn-outline-primary float-right">+ Tambah Berita</a>
                        </div>
                        <div class="table-responsive text-nowrap">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Judul Berita</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                    <?php $no = 1;
                                    foreach ($berita as $data) : ?>
                                        <tr>
                                            <td><i class="fab fa-angular fa-lg text-danger me-0"></i><?= $no++ ?></td>
                                            <td><i class="fab fa-angular fa-lg text-danger me-0"></i><?= $data['title'] ?></td>
                                            <td><span class="badge bg-label-primary me-1"><?= $data['status'] ?></span></td>
                                            <td>
                                                <div class="dropdown">
                                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                        <i class="bx bx-dots-vertical-rounded"></i>
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="<?= base_url('edit/' . $data['id']) ?>"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                                        <a class="dropdown-item" href="<?= base_url('delete/' . $data['id']) ?>"><i class="bx bx-trash me-1"></i> Delete</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- / Content -->

            </div>
            <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->