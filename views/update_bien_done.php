<?php
$headTitle = "Mise à jour du bien réussie";
$mainTitle = "Mise à jour terminée";
ob_start();
?>

<section class="main-sections">
  <article class="main-articles">
    <h2 class="main-articles-title">
      La mise à jour du bien est terminée
    </h2>
    <p>
      Votre bien a été mis à jour avec succès.
    </p>
    <a href="/" class="cta-links">Voir la liste des biens</a>
  </article>
</section>

<?php
$mainContent = ob_get_clean();
