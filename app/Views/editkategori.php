<?= $this->extend('layout2/template'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="my-3">Edit Kategori</h3>

            <form method="post" action="/Home/updateKate/<?= $kategori['kd_category']; ?>">
                <?= csrf_field(); ?>
                <div class="mb-3">

                    <label for="category" class="form-label">Kategori</label>
                    <input type="text" class="form-control <?= (validation_show_error('category')) ? 'is-invalid' : null; ?>" id="category" name="category" value="<?= (old('category')) ? old('category') : $kategori['category']; ?>">
                    <div class="invalid-feedback">
                        <?= validation_show_error('category'); ?>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>