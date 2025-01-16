<?php
$headTitle = "Détail du bien";
$mainTitle = "Détails";
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
      <button type="submit">Supprimer</button>
    </form>

    <article class="main-articles">
      <h2 class="main-articles-title">
        <?= $actualBien->title ?>
      </h2>
      <img loading="lazy" src="<?= $actualBien->image ?>" alt="<?= $actualBien->title ?>"/>
    </article>
  <?php endif ?>
</section>

<?php
$mainContent = ob_get_clean();
