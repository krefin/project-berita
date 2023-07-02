<?= $this->extend('layout/template-single'); ?>
<?= $this->section('content'); ?>
<!-- ======= Blog Single Section ======= -->


<div class="col-lg-12 entries">

    <article class="entry entry-single">

        <div class="entry-img text-center">
            <img src="assets/img/berita/<?= $berita['img']; ?>" alt="" class="img-fluid ">
        </div>

        <h2 class="entry-title">
            <a href="#"><?= $berita['judul']; ?></a>
        </h2>

        <div class="entry-meta">
            <ul>
                <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="blog-single.html">Ingfokan</a></li>
                <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="blog-single.html"><time datetime="<?= $berita['updated_at']; ?>"><?= $berita['updated_at']; ?></time></a></li>

            </ul>
        </div>

        <div class="entry-content">
            <?= $berita['isi_berita']; ?>
        </div>

        <div class="entry-footer">
            <i class="bi bi-folder"></i>
            <ul class="cats">
                <li><a href="#">Business</a></li>
            </ul>

            <i class="bi bi-tags"></i>
            <ul class="tags">
                <li><a href="#">Creative</a></li>
                <li><a href="#">Tips</a></li>
                <li><a href="#">Marketing</a></li>
            </ul>
        </div>

    </article><!-- End blog entry -->





</div><!-- End blog entries list -->
<?= $this->endSection(); ?>