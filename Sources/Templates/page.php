<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="keywords" content="Endotart, NationStates endorse, NationStates endorsement, NationStates influence"/>
  <meta name="description" content="Tart.CalRef is a fast and easy web utility to help you endorse Word Assembly members in your region.">
  <meta name="theme-color" content="#0099FF">
  <meta property="og:image" content="./Static/tart.png">
  <link rel="icon" type="image/x-icon" href="./favicon.ico">
  <link rel="stylesheet" href="./Static/tart-min.css">
  <title>Tart - <?=$title?></title>
</head>
<body>

<a class="button return is-hidden-tablet" href="#head">▲</a>

<div class="hero is-fullheight">

  <!-- Nav Bar -->

  <header class="mask">
    <nav class="navbar is-flex">
      <div class="navbar-brand is-flex-grow-2">
          <a href="https://calref.ca/" class="navbar-item depth glowm">
              <img height="48" width="48" src="./Static/icon.svg" alt="CalRef Logo" aria-label="Visit Calamity Refuge">
              <span class="mslim">CalRef</span>
          </a>
      </div>

      <form action="/index.php" method="GET" class="search-box is-flex-grow-2">
        <input type="submit" id="search" class="button search center is-info" value="Search">
        <input class="input bar" name="nation" id="nation" placeholder="Enter a nation" type="text" required="">
        <label for="nation" class="ada">Enter a nation</label>
        <input class="input" name="region" id="region" placeholder="Enter its region" type="text" required="">
        <label for="region" class="ada">Enter its region</label>
      </form>

      <div class="navbar-menu is-flex-grow-1">
        <div class="navbar-end">
          <a href="https://calref.ca/dot/" class="navbar-item depth"><i class="ico ico-dot"></i>Dot</a>
          <a href="https://eyebeast.calref.ca/" class="navbar-item depth"><i class="ico ico-eyebeast"></i>Eyebeast</a>
          <a href="https://tart.calref.ca/" class="navbar-item depth"><i class="ico ico-tart"></i>Tart.CalRef</a>
        </div>
      </div>
    </nav>
  </header>

  <main class="hero-body splash">
    <section class="hero-body px-2">
      <div class="container outline">
      <div class="subbox">

        <article class="media has-text-left">
          <figure class="image is-64x64">
            <a href="/"><img src="./Static/tart_logo.svg" alt="logo" aria-label="Return to splash page"></a>
          </figure>
        <div class="media-content mb-3">
          <h1 class="title is-flex blue space">
            <?=$title?>
          </h1>
          <h2 class="subtitle space is-flex">
          <?=$subtitle?>
          </h2>
        </div>
        </article>

        <hr>

        <p class="space">
          <?=$text?>
        </p>
      </div>
      </div>
    </section>
    </main>

  <!-- Footer -->

  <footer class="is-flex center">
    <div class="media-footer is-flex">
      <figure class="image depth is-32x32">
        <a href="https://calref.ca/"><img height="32" width="32" src="./Static/icon.svg" alt="CalRef Logo" aria-label="Visit Calamity Refuge"></a>
      </figure>
        <p class="media-content is-size-6 px-1">
          <span><a class="gold" href="https://calref.ca/">CalRef</a></span><span> © 2008-<?=date("Y")?></span>
          <span> | <a class="gold" href="https://calref.ca/donate">Support Our Servers</a></span>
        </p>
    </div>
  </footer>

</div>

</body>
</html>