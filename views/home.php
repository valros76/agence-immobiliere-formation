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
    
    <form action="/biens/add" method="GET">
      <button type="submit">Ajouter un bien</button>
    </form>
  </article>
</section>

<section class="card-sections">
  <?php 
  foreach($biensList as $key=>$bien):
    $cardLink = "/bien?id={$bien->id}";
    $cardTitle = $bien->title;
    $cardImage = $bien->image;
    $cardPrice = $bien->price;
    $cardPriceType = $bien->price_type;
    include "views/fragments/card.php";
  endforeach; 
  ?>
</section>

<!-- <?php include_once "views/fragments/archive/biens-grid.php" ?> -->

<?php
$mainContent = ob_get_clean();