<?php
$headTitle = "Modifier un bien";
$mainTitle = $actualBien->title;
ob_start();
?>

<section class="main-sections">
  <h2 class="main-sections-title">
    Modifier le bien
  </h2>
  
  <form action="/bien/update" method="POST">
    <label for="title">Nom / Titre</label>
    <input type="text" value="<?= $actualBien->title ?>" name="title" required />

    <label for="price">Prix</label>
    <input type="number" name="price" value="<?= $actualBien->price ?>" min="0" required />

    <label for="price_type">Type de prix</label>
    <select name="price_type">
      <option value="ttc" <?= strtolower($actualBien->price_type) === "ttc" ? "selected" : null?>>TTC</option>
      <option value="per_week" <?= strtolower($actualBien->price_type) === "per_week" ? "selected" : null?>>par semaine</option>
      <option value="per_month" <?= strtolower($actualBien->price_type) === "per_month" ? "selected" : null?>>par mois</option>
    </select>

    <label for="offer">Type d'offre</label>
    <select name="offer">
      <option value="buy" <?= strtolower($actualBien->offer) === "buy" ? "selected" : null?>>Achat</option>
      <option value="rent" <?= strtolower($actualBien->offer) === "rent" ? "selected" : null?>>Location</option>
    </select>

    <label for="image">Image de l'annonce</label>
    <input type="text" value="<?= $actualBien->image ?>" name="image" required />

    <label for="location">Adresse du bien</label>
    <input type="text" value="<?= $actualBien->location ?>" name="location" required />

    <label for="nb_rooms">Nombre de chambres</label>
    <input type="number" value="<?= $actualBien->nb_rooms ?? "0" ?>" name="nb_rooms" min="0" required />

    <label for="nb_beds">Nombre de lits</label>
    <input type="number" value="<?= $actualBien->nb_beds ?? "0" ?>" name="nb_beds" min="0" required />

    <label for="nb_bathrooms">Nombre de salles de bains</label>
    <input type="number" value="<?= $actualBien->nb_bathrooms ?? "0" ?>" name="nb_bathrooms" min="0" required />

    <label for="equipments">Équipements disponibles dans le bien (optionnel)</label>
    <textarea name="equipments"><?= $actualBien->equipments ?></textarea>

    <button type="submit">Modifier</button>
  </form>

</section>

<?php
$mainContent = ob_get_clean();