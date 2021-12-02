<nav class="product-filter">
  <h1>Jouet</h1>
  <div class="sort">
    <div class="collection-sort">
      <label>Filter by:</label>
      <select>
        <option value="/">Chien</option>
      </select>
    </div>
  </div>
</nav>
<?php
foreach($articles as $article){
  echo '<br>';
  ?>

<section class="products">
  <div class="product-card">
    <div class="product-image">
      <img src="IMG_PRODUIT">
    </div>
    <div class="product-info">
      <!--<img src="<?= $article->IMG_PRODUIT ?>">-->
      <h5><?= $article->NOM_PRODUIT ?></h5>
      <h6><?= $article->PRIX_PRODUIT ?> €</h6>
      <input type="button" value="Ajouter au pagnier">
    </div>
  </div>
</section>

<?php
}
?>