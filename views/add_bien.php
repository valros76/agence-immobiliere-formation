<?php
$headTitle = "Ajouter un bien";
$mainTitle = "Nouveau bien";
ob_start();
?>

<section class="main-sections">
  <h2 class="main-sections-title">
    Ajoutez un nouveau bien
  </h2>
  
  <form action="/biens/add" method="POST" id="addForm">

    <label for="title">Nom / Titre</label>
    <input type="text" name="title" required />

    <label for="price">Prix</label>
    <input type="number" name="price" value="0" min="0" required />

    <label for="price_type">Type de prix</label>
    <select name="price_type">
      <option value="ttc" selected>TTC</option>
      <option value="per_week">par semaine</option>
      <option value="per_month">par mois</option>
    </select>

    <label for="offer">Type d'offre</label>
    <select name="offer">
      <option value="buy">Achat</option>
      <option value="rent">Location</option>
    </select>

    <label for="image">Image de l'annonce</label>
    <input type="text" name="image" required />

    <label for="location">Adresse du bien</label>
    <input type="text" name="location" required />

    <label for="nb_rooms">Nombre de chambres</label>
    <input type="number" value="0" name="nb_rooms" min="0" required />

    <label for="nb_beds">Nombre de lits</label>
    <input type="number" value="0" name="nb_beds" min="0" required />

    <label for="nb_bathrooms">Nombre de salles de bains</label>
    <input type="number" value="0" name="nb_bathrooms" min="0" required />

    <label for="equipments">Équipements disponibles dans le bien (optionnel)</label>
    <textarea name="equipments"></textarea>

    <button type="submit">Ajouter</button>
  </form>

</section>

<?php
$mainContent = ob_get_clean();
$addScripts = "<script src='sources/js/add_bien.js' defer></script>";