<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="keywords" content="Endotart, CalRef Network, Calamity Refuge, NationStates endorse"/>
  <meta name="description" content="Tart allows you to input a nation's name and the name of their region of residence, then receive an organised list of all nations they have not endorsed as of NationStates' last Major update (21:00-22:30 PST).">
  <meta name="theme-color" content="#0099FF">
  <meta property="og:image" content="./Static/tart.png">
  <link rel="icon" type="image/x-icon" href="./Static/favicon.ico">
  <link rel="stylesheet" href="https://calref.ca/bulma.css">
  <link rel="stylesheet" href="./Static/tart.css">
  <title>Tart - <?=$title?></title>
</head>
<body>

<a class="button return is-hidden-tablet" href="#head">▲</a>

<div class="hero is-fullheight">

  <!-- Permanent Search Bar -->

  <header class="mask">
    <nav class="navbar" role="navigation" aria-label="main navigation">
      <div class="navbar-start center is-fullwidth">
        <form action="/index.php" class="search-box" method="GET">
          <input type="submit" id="search" class="button search center is-info" value="Search">
          <div>
            <input class="input bar" name="nation" id="nation" type="text" required>
            <label for="nation">Enter a nation</label>
          </div>
          <div class="pl-1">
            <input class="input" name="region" id="region" type="text" required>
            <label for="region">Enter its region</label>
          </div>
        </form>
      </div>
    </nav>
  </header>

  <main class="hero-body splash">
    <section class="hero-body px-2">
      <div class="container outline">
      <div class="subbox">

        <article class="media has-text-left">
          <figure class="image is-64x64">
            <a href="/"><img src="./Static/tart.png" alt="logo" aria-label="Return to splash page"></a>
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
        <a href="https://calref.ca/"><img src="./Static/icon.png" alt="CalRef Logo" aria-label="Visit Calamity Refuge"></a>
      </figure>
      <div class="media-content px-1">
        <p class="is-size-6">
          <span><a class="gold" href="https://calref.ca/">CalRef</a></span><span> © 2008-<?=date("Y")?></span>
          <span> | <a class="gold" href="https://calref.ca/donate">Support Our Servers</a></span>
        </p>
      </div>
    </div>
  </footer>

</div>

</body>
</html>