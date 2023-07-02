<?= $this->extend('layout2/template'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="my-3">Tambah Berita</h3>

            <form method="post" action="/Home/tambahBerita" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="mb-3">
                    <label for="judul" class="form-label">Judul</label>
                    <input type="text" class="form-control <?= (validation_show_error('judul')) ? 'is-invalid' : null; ?>" id="judul" name="judul">
                    <div class="invalid-feedback">
                        <?= validation_show_error('judul'); ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="isi_berita" class="form-label">Isi Berita</label>
                    <div class="isi_berita">
                        <textarea class="form-control <?= (validation_show_error('isi_berita')) ? 'is-invalid' : null; ?>" id="isi_berita" name="isi_berita"></textarea>
                    </div>
                    <div class="invalid-feedback">
                        <?= validation_show_error('isi_berita'); ?>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="category" class="form-label">Kategori</label>
                    <select class="form-select <?= (validation_show_error('category')) ? 'is-invalid' : null; ?>" aria-label="Default select example" id="category" name="category">
                        <option selected> -- Pilih Kategori -- </option>
                        <?php foreach ($kategori as $k) : ?>
                            <option value="<?= $k['category']; ?>"><?= $k['category']; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <div class="invalid-feedback">
                        <?= validation_show_error('category'); ?>
                    </div>
                </div>
                <div class="mb-3 d-inline">
                    <label for="img" class="col-sm-2 col-form-label">Gambar</label>
                    <div class="col-sm-2">
                        <img src="/assets/img/berita/" class="img-thumbnail img-preview">
                    </div>
                    <div class="col-sm-8">
                        <div class="input-group mb-3">
                            <input type="file" class="form-control <?= (validation_show_error('img')) ? 'is-invalid' : null; ?>" id="img" name="img" onchange="previewImg()">
                            <div class="invalid-feedback">
                                <?= validation_show_error('img'); ?>
                            </div>
                            <label class="input-group-text" for="img">Pilih Gambar...</label>
                        </div>

                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Terbitkan</button>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>