<article class="card-articles">
  <a href="<?= $cardLink ?>" class="card-links">
    <img loading="lazy" src="<?= $cardImage ?>" alt="<?= $cardTitle ?>" class="card-image" width="1920" height="1080">
    <h2 class="card-articles-title">
      <?= $cardTitle ?>
    </h2>
    <p>
      <span class="card-price"><?= $cardPrice ?>€</span> <span class="card-price-description"><?= $cardPriceDescription ?></span>
    </p>
  </a>
</article>