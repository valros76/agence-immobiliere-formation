<?php
$headTitle = "Accueil - Agence IPSSI";
$mainTitle = "Accueil";
ob_start();
?>
<section class="main-sections">
  <article class="main-articles">
    <h2 class="main-articles-title">
      Mon bien immobilier
    </h2>
    <p>
      Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita, fuga eligendi voluptatibus nobis maiores assumenda!
    </p>
  </article>
</section>

<section class="card-sections">
  <article class="card-articles">
    <a href="#" class="card-links">
      <img loading="lazy" src="<?= $firstBien->image ?>" alt="<?= $firstBien->title ?>" class="card-image" width="1920" height="1080">
    </a>
  </article>
</section>

<!-- <?php include_once "views/fragments/biens-grid.php" ?> -->

<?php
$mainContent = ob_get_clean();
