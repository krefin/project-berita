<?= $this->extend('layout2/template'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <div class="table-responsive">
                <a href="/Home/tambahKategori" class="btn btn-primary my-3">Tambah Kategori</a>
                <table class="table text-center">
                    <thead>
                        <tr>
                            <th scope="col">NO</th>
                            <th scope="col">KATEGORI</th>
                            <th scope="col">AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        foreach ($kategori as $k) : ?>
                            <tr>
                                <th scope="row"><?= $i++; ?></th>
                                <td><?= $k['category']; ?></td>
                                <td>
                                    <a href="/Home/editKategori/<?= $k['kd_category']; ?>" class="btn btn-warning">EDIT</a>
                                    <form action="/Home/kategori/<?= $k['kd_category']; ?>" method="post" class="d-inline">
                                        <?php csrf_field(); ?>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin?');">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

            </div>

        </div>
    </div>
</div>
<?= $this->endSection(); ?>