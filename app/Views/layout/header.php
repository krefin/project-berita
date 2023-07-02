<header id="header" class="d-flex align-items-center">
  <div class="container d-flex justify-content-between align-items-center">

    <div class="logo">
      <h1><a href="/Home">Ingfokan</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
    </div>

    <nav id="navbar" class="navbar">
      <ul>
        <li><a href="/Home">Home</a></li>
        <?php foreach ($kategori as $k) : ?>
          <li><a href="/Home/sortKategori/<?= $k['category']; ?>"><?= $k['category']; ?></a></li>
        <?php endforeach; ?>
        <li><a href="/login">Login</a></li>
      </ul>
      <i class="bi bi-list mobile-nav-toggle"></i>
    </nav><!-- .navbar -->

  </div>
</header><!-- End Header -->