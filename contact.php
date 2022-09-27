<?php
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
    <link rel="stylesheet" href="css/form.css">
    <link rel="stylesheet" href="plugins/mmenu-light/mmenu-light.css" />
    <script src="plugins/mmenu-light/mmenu-light.js"></script>
    <script src="js/site.js"></script>
    <script src="js/contactform.js"></script>
  </head>
  <body class="contact not-front">
  
  <?php require_once('src/_parts/header.php'); ?>
    
    <div id="page">
    
      <div id="content" class="row">
        <h1>Contact Us</h1>
        <div id="contact-data" class="grid">
          
          <form method="post" action="src/form.php" id="contactform" enctype="multipart/form-data">
            <fieldset id="names">
              <div>
                <label for="name">Name <sup>*</sup></label>
                <input type="text" id="name" name="name" aria-required="true" />
              </div>
              <div>
                <label for="surname">Surname <sup>*</sup></label>
                <input type="text" id="surname" name="surname" aria-required="true" />
              </div>
            </fieldset>
            <label for="email">Email <sup>*</sup></label>
            <input type="email" autocomplete="email" spellcheck="false" id="email" name="email" aria-required="true" />
            <label for="subject">Subject <sup>*</sup></label>
            <input type="text" id="subject" name="subject" aria-required="true" />
            <label for="message">Message <sup>*</sup></label>
            <textarea id="message" name="message" rows="5" aria-required="true"></textarea>
            <input type="submit" class="submit" value="Send" />
          </form>

          <div class="map">
            <p>International Beauty Group</p>
            <p>Blegistrasse 9</p>
            <p>CH-6340 Baar</p>
            <p>Switzerland</p>
            <iframe width="100%" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2710.029805709069!2d8.570899599999999!3d47.2159991!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x479aa95cd867a08d%3A0x2f21e08540323fc3!2sBlegistrasse%209%2C%206340%20Baar%2C%20Szwajcaria!5e0!3m2!1spl!2spl!4v1664283630923!5m2!1spl!2spl" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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