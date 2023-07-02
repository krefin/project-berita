<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>



<div class="col-lg-8 entries">
    <?php foreach ($berita as $b) : ?>
        <article class="entry">

            <div class="entry-img">
                <img src="assets/img/berita/<?= $b['img']; ?>" alt="" class="img-fluid">
            </div>

            <h2 class="entry-title">
                <a href="/Home/single/<?= $b['kd_content']; ?>"><?= $b['judul']; ?></a>
            </h2>

            <div class="entry-meta">
                <ul>
                    <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="/Home/single">Ingfokan</a></li>
                    <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="/Home/single"><time datetime="<?= $b['updated_at']; ?>"><?= $b['updated_at']; ?></time></a></li>

                </ul>
            </div>

        </article><!-- End blog entry -->
    <?php endforeach; ?>

    <!-- <div class="blog-pagination">
        <ul class="justify-content-center">
            <li><a href="#">1</a></li>
            <li class="active"><a href="#">2</a></li>
            <li><a href="#">3</a></li>
        </ul>
    </div> -->

</div><!-- End blog entries list -->





<?= $this->endSection(); ?>