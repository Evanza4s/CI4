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
                <li class="menu-item">
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
                    <h1>Search Result</h1>
                    <div class="card">
                        <h5 class="card-header">Berita</h5>
                        <div class="table-responsive text-nowrap">
                            <table class="table">
                                <?php if (count($berita) > 0) : ?>
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Judul Berita</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-border-bottom-0">
                                        <?php foreach ($berita as $item) : ?>
                                            <tr>
                                                <td><i class="fab fa-angular fa-lg text-danger me-0"></i><?= $item['id'] ?></td>
                                                <td><i class="fab fa-angular fa-lg text-danger me-0"></i><?= $item['title'] ?></td>
                                                <td><span class="badge bg-label-primary me-1"><?= $item['status'] ?></span></td>
                                                <td>
                                                    <div class="dropdown">
                                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                            <i class="bx bx-dots-vertical-rounded"></i>
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" href="<?= base_url('edit/' . $item['id']) ?>"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                                            <a class="dropdown-item" href="<?= base_url('delete/' . $item['id']) ?>"><i class="bx bx-trash me-1"></i> Delete</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                            </table>
                        <?php else : ?>
                            <p class="card-footer">No result found.</p>
                        <?php endif; ?>
                        </div>
                    </div>
                </div>

                <div class="container mt-5">
                    <div class="card">
                        <h5 class="card-header">Kisah</h5>
                        <div class="table-responsive text-nowrap">
                            <table class="table">
                                <?php if (count($kisah) > 0) : ?>
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Judul Kisah</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-border-bottom-0">
                                        <?php foreach ($kisah as $item) : ?>
                                            <tr>
                                                <td><i class="fab fa-angular fa-lg text-danger me-0"></i><?= $no++ ?></td>
                                                <td><i class="fab fa-angular fa-lg text-danger me-0"></i><?= $item['title'] ?></td>
                                                <td><span class="badge bg-label-primary me-1"><?= $item['status'] ?></span></td>
                                                <td>
                                                    <div class="dropdown">
                                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                            <i class="bx bx-dots-vertical-rounded"></i>
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" href="<?= base_url('kisah/edit/' . $item['id']) ?>"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                                            <a class="dropdown-item" href="<?= base_url('kisah/delete/' . $item['id']) ?>"><i class="bx bx-trash me-1"></i> Delete</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                            </table>
                        <?php else : ?>
                            <p class="card-footer">No result found.</p>
                        <?php endif; ?>
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