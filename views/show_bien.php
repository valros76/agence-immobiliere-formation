<?php
$headTitle = "Détail du bien";
$mainTitle = "{$actualBien->id} - {$actualBien->title}";
ob_start();
?>

<section class="main-sections">
  <?php if ($actualBien === false): ?>
    <article class="main-articles">
      <h2 class="main-articles-title">
        Ce bien n'existe pas
      </h2>
      <p>
        Retourner sur la <a href="/">liste des biens</a>.
      </p>
    </article>
  <?php else: ?>
    <form action="/biens/delete" method="POST">
      <input type="hidden" value="<?= $actualBien->id ?>" name="id">
      <button type="submit" class="error">Supprimer</button>
    </form>

    <form action="/bien/update" method="POST">
      <input type="hidden" value="<?= $actualBien->id ?>" name="id">
      <button type="submit">Mettre à jour</button>
    </form>

    <article class="card-articles no-anim">
      <h2 class="card-articles-title">
        <?= $actualBien->title ?>
      </h2>
      <img loading="lazy" src="<?= $actualBien->image ?>" alt="<?= $actualBien->title ?>" class="card-image"/>
      
    <p>
      <span class="card-price"><?= number_format($actualBien->price, 2, ",", ".") ?>€</span> <span class="card-price-description"><?= $actualBien->price_type ?></span>
    </p>
    <p>
      <b>Type d'offre :</b> <?= $actualBien->offer ?>.
    </p>
    <p>
      <b>Adresse :</b> <?= $actualBien->location ?>.
    </p>
    <ul>
      <li>
        <b>Nombre de chambres :</b> <?= $actualBien->nb_rooms?>
      </li>
      <li>
        <b>Nombre de lits :</b> <?= $actualBien->nb_beds?>
      </li>
      <li>
        <b>Nombre de salles de bain :</b> <?= $actualBien->nb_bathrooms?>
      </li>
    </ul>
    <?php if($actualBien->equipments !== ""): ?>
    <p>
      <b>Équipements :</b> <?= $actualBien->equipments ?>.
    </p>
    <?php endif ?>
    </article>
  <?php endif ?>
</section>

<?php
$mainContent = ob_get_clean();
