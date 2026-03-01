<div class="titulo-pagina">
  <h1>Plantitas</h1>
</div>

<div class="category-grid">
  <?php foreach ($categorias as $cat): ?>
    <div class="category-item">
      <a href="#" onclick="cargarProductosCategoria(<?= $cat['id'] ?>)">
        <picture class="category-image-wrapper">
          <?php 
              $imgRuta = isset($cat['img']) && $cat['img'] ? '/img/' . $cat['img'] : '/img/plantitas_logo.png';
              $isDefaultImage = ($imgRuta === '/img/plantitas_logo.png'); 
          ?>
          <img src="<?= $imgRuta ?>" alt="<?= htmlentities($cat['categoria'], ENT_QUOTES | ENT_HTML5, 'UTF-8') ?>" class="category-image <?= $isDefaultImage ? 'category-image-default' : '' ?>"> 
        </picture>
        <div class="category-name"><p><?= htmlentities($cat['categoria'], ENT_QUOTES | ENT_HTML5, 'UTF-8') ?></p></div>
      </a>
    </div>
  <?php endforeach; ?>
  
</div>


<section class="promociones">
  <h2>🌿 Promociones del Momento 🌿</h2>
  <div>
    <?php 
      require __DIR__."/../controlador/c_productos_promo_inicio.php";
    ?>
  </div>
</section>


<!-- Section de About Us -->
<section class="about-us">
  <h2>🌸 Sobre Nosotros 🌸</h2>
  <p>
    Somos un pequeño vivero online apasionado por acercar la naturaleza a cada 
    rincón del hogar. Creemos que una plantita puede cambiar por completo la 
    energía de un espacio, hacerte sentir más acompañado/a y hasta mejorar tu 
    día sin que te des cuenta.
  </p>
  <p class="about-us-sub">— ¿Por qué escogernos? —</p>
  <p>
    Porque cuidamos cada plantita desde que brota, para que 
    llegue a tus manos sana, fuerte y lista para crecer contigo. Nos encanta 
    ayudarte a encontrar la planta ideal según tu espacio, tu tiempo y tu estilo.
  </p>
</section>
