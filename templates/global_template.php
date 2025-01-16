<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $headTitle ?? "Agence immobilière" ?></title>
  <link rel="stylesheet" href="/sources/css/global.css">
</head>
<body>
  <header class="main-head">
    <h1 class="main-head-title">
      <?= $mainTitle ?? "Agence IPSSI" ?>
    </h1>
  </header>

  <?php include_once "templates/fragments/main-nav.php" ?>

  <main class="main-content">
    <?= $mainContent ?? "Erreur 404" ?>
  </main>

  <footer class="main-foot">
    <p class="copyright">© Webdevoo - 2025</p>
  </footer>

  <?= $addScripts ?? null ?>
</body>
</html>