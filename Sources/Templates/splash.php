<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="keywords" content="Endotart, NationStates endorse, NationStates endorsement, NationStates influence"/>
  <meta name="description" content="Tart.CalRef is a fast and easy web utility to help you endorse World Assembly members in your region.">
  <meta name="theme-color" content="#0099FF">
  <meta property="og:image" content="/Static/tart.png">
  <link rel="icon" type="image/x-icon" href="/favicon.ico">
  <link rel="stylesheet" href="/Static/tart-min.css">
  <title>Tart.CalRef</title>
</head>
<body>

<div class="hero is-fullheight">

<header class="mask mslim">
    <nav class="navbar is-flex">
      <div class="navbar-brand is-flex-grow-2">
          <a href="https://calref.ca/" class="navbar-item depth glowm">
              <img height="48" width="48" src="/Static/icon.svg" alt="CalRef Logo" aria-label="Visit Calamity Refuge">
              CalRef
          </a>
      </div>

      <div class="navbar-menu is-flex-grow-1">
        <div class="navbar-end">
          <a href="https://calref.ca/dot/" class="navbar-item depth"><i class="ico ico-dot"></i>Dot</a>
          <a href="https://eyebeast.calref.ca/" class="navbar-item depth"><i class="ico ico-eyebeast"></i>Eyebeast</a>
          <a href="https://tart.calref.ca/" class="navbar-item depth"><i class="ico ico-tart"></i>Tart.CalRef</a>
          <a href="https://rmm.calref.ca/" class="navbar-item depth"><i class="ico ico-rmm"></i>RMM</a>
        </div>
      </div>
    </nav>
  </header>

  <main class="hero-body px-2">
    <div class="container outline">
      <div class="subbox">

        <div class="media has-text-left">
          <figure class="image is-64x64">
            <a href="/"><img src="/Static/tart_logo.svg" alt="logo" aria-label="Reload the splash page"></a>
          </figure>
          <div class="media-content mb-3">
            <span class="tag is-info">v<?=$version?></span>
            <h1 class="title blue space">
              Tart.CalRef
            </h1>
            <h2 class="subtitle space">
              NationStates Endorsement Aid
            </h2>
          </div>
        </div>

        <!-- Intro -->

        <hr>

        <p class="space">
          Tart is a free <a href="https://github.com/Lucabaduka/Tart">open-source</a> utility to help you endorse other World
          Assembly members in your region on <a href="https://www.nationstates.net/">NationStates.net</a>. Endorsing all members
          in a region is called "endotarting", and it's the fastest way to gain endorsements and generate influence, yourself.
          You can use the input below to get a list of members you haven't endorsed as of the last daily database update.
        </p>

        <!-- Operator Input -->

        <nav class="navbar" role="navigation" aria-label="main navigation">
            <div class="navbar-start center is-fullwidth">
              <form action="/index.php" method="GET" class="search-box">
                <button type="submit" id="search" class="button search center is-info ico-search"></button>
                <input class="input bar" name="nation" id="nation" placeholder="Nation" type="text" required="">
                <label for="nation" class="ada">Enter a nation</label>
                <input class="input" name="region" id="region" placeholder="Region" type="text" required="">
                <label for="region" class="ada">Enter its region</label>
              </form>
            </div>
          </nav>

      </div>
      <p class="content is-small gold depth ml-4">
        <i>Last Update: <?=$time->Stamp()?></i>
      </p>

      <!-- Influence 101 -->

      <details class="subbox">
        <summary class="is-size-4 blue">Why Endorsements Matter<hr class="mt-2"></summary>
        <p class="space">
          The influence stat is a great boon! In addition to being a possible 1% census badge, it's a vital component of regional
          security. When a region loses its Governor, the region's World Assembly Delegate gains executive authority, and is able
          to control almost all aspects of regional administration. Since the Delegate is whichever nation has the most
          endorsements, a region can become hijacked by a coordinated group of nations aiming to take over with little to no
          notice. In these takeovers, it is possible for invaders to empty the region of nations, causing the region to be deleted
          and destroying its posts, images, and history.
        </p>
        <p class="space">
          One saving grace is that while a Governor may ban nations for free, an invader must spend influence. For Delegates,
          the cost is half the influence of the nation they wish to ban. Therefore, the more influence a nation has, the harder
          it becomes to ban them. Nations receive one influence point twice a day for each endorsement they have; therefore, the
          earlier nations collectively start to build influence, the safer everyone will be. This technique of mutual protection
          is called an Influence Fortress, one of the best methods of ensuring that your region is never destroyed by invaders.
        </p>
        <p class="space">
          Be aware that some regions have limits on how many endorsements a nation can legally have. You may wish to check if
          your region is one with such limits.
        </p>
      </details>
    </div>
  </main>

  <!-- Footer -->
  <?php include "footer.php"; ?>

</div>

</body>
</html>
