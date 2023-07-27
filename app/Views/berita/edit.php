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
                        <i class="menu-icon tf-icons bx bxs-berita"></i>
                        <div berita-i18n="Analytics">Berita</div>
                    </a>
                </li>

                <!-- Tokoh Inspirasi -->
                <li class="menu-item">
                    <a href="/kisah" class="menu-link">
                        <i class='menu-icon tf-icons bx bx-group'></i>
                        <div berita-i18n="Analytics">Tokoh Inspirasi</div>
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
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Tambah Berita</h3>
                    </div>
                    <?php if (isset($validation)) : ?>
                        <div class="alert alert-dismissible">
                            <?php echo $validation->listErrors() ?>
                        </div>
                    <?php endif ?>
                    <div class="card-body">
                        <form action="<?php echo base_url('update/' . $berita['id']) ?>" method="post" enctype="multipart/form-data">
                            <?php if (isset($validation)) : ?>
                                <p class="alert alert-danger"><?= $validation->getError('title') ?></p>
                            <?php endif; ?>
                            <div class="form-outline mb-4">
                                <input name="title" type="text" id="title" class="form-control" value="<?= old('title', $berita['title'] ?? '') ?>" />
                                <label class="form-label" for="title">Title</label>
                            </div>

                            <?php if (isset($validation)) : ?>
                                <p class="alert alert-danger"><?= $validation->getError('subtitle') ?></p>
                            <?php endif; ?>
                            <div class="form-outline mb-4">
                                <input name="subtitle" type="text" id="subtitle" class="form-control" value="<?= old('subtitle', $berita['subtitle'] ?? '') ?>" />
                                <label class="form-label" for="subtitle">Subtitle</label>
                            </div>

                            <?php if (isset($validation)) : ?>
                                <p><?= $validation->getError('writer') ?></p>
                            <?php endif; ?>
                            <div class="form-outline mb-4">
                                <input name="writer" type="text" id="writer" class="form-control" value="<?= old('writer', $berita['writer'] ?? '') ?>" />
                                <label class="form-label" for="writer">Writer</label>
                            </div>

                            <?php if (isset($validation)) : ?>
                                <p><?= $validation->getError('image') ?></p>
                            <?php endif; ?>
                            <div class="form-outline mb-4">
                                <input name="image" type="file" class="form-control" id="image" />
                                <label class="form-label" for="image">image</label>
                                <?php if (isset($berita['image'])) : ?>
                                    <img src="<?= base_url('uploads/' . $berita['image']) ?>" alt="<?= $berita['image'] ?>" width="200">
                                <?php endif; ?>
                            </div>

                            <?php if (isset($validation)) : ?>
                                <p><?= $validation->getError('status') ?></p>
                            <?php endif; ?>
                            <div class="form-outline mb-4">
                                <select name="status" id="status" class="form-select" required>
                                    <option value="">-- Select Status --</option>
                                    <option value="active" <?= (isset($berita) && array_key_exists('status', $berita) && $berita['status'] == 'active') ? 'selected' : '' ?>>Active</option>
                                    <option value="inactive" <?= (isset($berita) && array_key_exists('status', $berita) && $berita['status'] == 'inactive') ? 'selected' : '' ?>>Inactive</option>
                                    <option value="completed" <?= (isset($berita) && array_key_exists('status', $berita) && $berita['status'] == 'completed') ? 'selected' : '' ?>>Completed</option>
                                    <option value="scheduled" <?= (isset($berita) && array_key_exists('status', $berita) && $berita['status'] == 'scheduled') ? 'selected' : '' ?>>Scheduled</option>
                                    <option value="pending" <?= (isset($berita) && array_key_exists('status', $berita) && $berita['status'] == 'pending') ? 'selected' : '' ?>>Pending</option>
                                </select>
                                <label class="form-label" for="status">Status</label>
                            </div>

                            <?php if (isset($validation)) : ?>
                                <p><?= $validation->getError('content') ?></p>
                            <?php endif; ?>
                            <div class="form-outline mb-4">
                                <textarea name="content" class="form-control" id="content" rows="10"><?= old('content', $berita['content'] ?? '') ?></textarea>
                                <label class="form-label" for="content">Content</label>
                            </div>

                            <a href="/berita" class="btn btn-secondary btn-block mb-4">Kembali</a>
                            <button type="submit" class="btn btn-primary btn-block mb-4">Update</button>
                        </form>
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