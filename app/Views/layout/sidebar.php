<div class="col-lg-4">

    <div class="sidebar">

        <h3 class="sidebar-title">Search</h3>
        <div class="sidebar-item search-form">
            <form action="/Home/search" method="post">
                <input type="text" name="search">
                <button type="submit"><i class="bi bi-search"></i></button>
            </form>
        </div><!-- End sidebar search formn-->

        <h3 class="sidebar-title">Categories</h3>
        <div class="sidebar-item categories">
            <ul>
                <?php foreach ($kategori as $k) : ?>
                    <li><a href="/Home/sortKategori/<?= $k['category']; ?>"><?= $k['category']; ?></a></li>
                <?php endforeach; ?>
            </ul>
        </div><!-- End sidebar categories-->

        <h3 class="sidebar-title">Recent Posts</h3>
        <div class="sidebar-item recent-posts">
            <?php foreach ($berita as $b) : ?>
                <div class="post-item clearfix">
                    <img src="assets/img/berita/<?= $b['img']; ?>">
                    <h4><a href="/Home/single/<?= $b['kd_content']; ?>"><?= $b['judul']; ?></a></h4>
                    <time datetime="<?= $b['updated_at']; ?>"><?= $b['updated_at']; ?></time>
                </div>
            <?php endforeach; ?>


        </div><!-- End sidebar recent posts-->


    </div><!-- End sidebar -->

</div><!-- End blog sidebar -->