    <div id="header" class="row">
      <div id="header-bar">
        <div id="header-hamburger">
          <a href="#menu"><img src="img/hamburger.svg" /> <span>Menu</span></a>
        </div>
        <div id="header-title">
          <a href="index.html"><img id="logo" src="img/logo.png"/></a>
        </div>
        <div id="header-links">
          <ul>
            <li><a class="join-the-team" href="jobs.php">Join the Team</a></li>
            <li><a href="contact.php">Contact</a></li>
          </ul>
        </div>
      </div>
      <?php if (isset($front)): ?>
      <div class="header-video">
        <div style="padding:56.25% 0 0 0;position:relative;"><iframe src="https://player.vimeo.com/video/753898138?background=1&autoplay=1&loop=1&byline=0&title=0" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen style="position:absolute;top:0;left:0;width:100%;height:100%;"></iframe></div>
      </div>
      <?php endif ?>
    </div>