<?php
$front = true;
require_once('src/site.php');
?>
<!DOCTYPE html>
<html>
  <head>
    <title>International Beauty Group</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/content.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/grid.css">
    <link rel="stylesheet" href="plugins/mmenu-light/mmenu-light.css" />
    <script src="plugins/mmenu-light/mmenu-light.js"></script>
    <script src="js/site.js"></script>
  </head>
  <body class="front">
  
    <?php require_once('src/_parts/header.php'); ?>
    
    <div id="page">
    
      <div id="about" class="row">
        <div class="grid content-grid">
          <div class="row-title">
             <h2>WE BUILD AND ACCELERATE PREMIUM BRANDS</h2>
          </div>
          <div class="row-content">
            <p>Hi, we're the International Beauty Group - making the world a bit more beautiful every day. We create problem solving premium products and and brands with bold strategies that deliver to the needs of today's demanding consumer.</p>
          </div>
        </div>
      </div>
      
      <div id="brands">
      
        <div class="row odd">
          <h2>Our Brands</h2>
            <div class="grid brand-grid">
              <div class="rectangle-big">
                 <h3>SmilePen</h3>
                 <div><img src="img/smilepen_cover.jpg" /></div>
              </div>
              <div class="rectangle-small">
                <h3>UltraSmile</h3>
                <div>
                   <img src="img/smilepen.jpg" />
                </div>
              </div>
              <div class="rectangle-small">
                <h3>Brand Name</h3>
                <div>
                  <img src="img/smilepen.jpg" />
                </div>
              </div>
            </div>
        </div>

        <div class="row even">
          <div class="grid brand-grid">
            <div class="rectangle-big">
              <h3>Brand Name</h3>
              <div>
                <img src="img/smilepen.jpg" />
              </div>
            </div>
            <div class="rectangle-small">
              <h3>Brand Name</h3>
              <div>
                <img src="img/smilepen.jpg" />
              </div>
            </div>
            <div class="rectangle-small">
              <h3>Brand Name</h3>
              <div>
                <img src="img/smilepen.jpg" />
              </div>
            </div>
          </div>
        </div>
        
      </div>
      
      <div id="instagram">
        <h2>Follow us on Instagram</h2>
        <p class="social-link"><a href="#">@internationalbeautygroup</a></p>
      </div>

      <div id="footer">
        <?php print instagramFeed(); ?>
      </div>
      
    </div> <!-- /page -->

    <?php require_once('src/_parts/menu.php'); ?>
  </body>
</html>