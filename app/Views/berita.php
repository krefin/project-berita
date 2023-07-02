<?= $this->extend('layout2/template'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">NO</th>
                            <th scope="col">JUDUL</th>
                            <th scope="col">ISI BERITA</th>
                            <th scope="col">GAMBAR</th>
                            <th scope="col">AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        foreach ($berita as $b) : ?>
                            <tr>
                                <th scope="row"><?= $i++; ?></th>
                                <td><?= $b['judul']; ?></td>
                                <td><?= $b['isi_berita']; ?></td>
                                <td><?= $b['img']; ?></td>
                                <td>
                                    <a href="/Home/editBerita/<?= $b['kd_content']; ?>" class="btn btn-warning">EDIT</a>
                                    <form action="/Home/berita/<?= $b['kd_content']; ?>" method="post" class="d-inline">
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