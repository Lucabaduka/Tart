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
  <title>Tart.CalRef</title>
</head>
<body>

<div class="hero is-fullheight">

  <main class="hero-body">
    <div class="container outline">
      <div class="subbox">

        <article class="media has-text-left">
          <figure class="image is-64x64">
            <a href="/"><img src="./Static/tart.png" alt="logo" aria-label="Reload the splash page"></a>
          </figure>
          <div class="media-content mb-3">
            <span class="tag is-info">v<?=$version?></span>
            <h1 class="title is-flex blue space">
              Tart.CalRef
            </h1>
            <h2 class="subtitle space is-flex">
              Universal Endorsement Aid
            </h2>
          </div>
        </article>

        <!-- Intro -->

        <hr>

        <p class="space">
          This site is a utility to help you endorse other World Assembly regions within your region on
          <a href="https://www.nationstates.net/">NationStates.net</a>. This process is called "endotarting", and it's the fastest
          way to gain endorsements, yourself, as well as build influence. You can use the controls below to input your nation and
          region to get a list of everyone you haven't endorsed as of the last daily database update.
        </p>

        <!-- Operator Input -->

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

      </div>
      <p class="content is-small gold ml-4">
        <i>Last Update: <?=$time->Stamp()?></i>
      </p>

      <!-- Influence 101 -->

      <details class="subbox">
        <summary class="title blue">Why Endorsements Matter<hr class="mt-2"></summary>
        <p class="space">
          For most regions, influence is a great boon. In addition to providing you another potential gold 1% census badge,
          it's also a vital component of regional security. When a region loses its Governor, the region's World Assembly
          Delegate will gain executive authority over the region and be able to control almost all aspects of its administration.
          Since the Delegate is whichever nation has the most endorsements, a region can become hijacked by a coordinated,
          hostile takeover with little to no notice. In these takeovers, it is possible for invaders to destroy the region
          and all of its posts and history.
        </p>
        <p class="space">
          One saving grace is that while a Governor may ban nations for free, an invader must spend influence to do it. For
          Delegates, the cost is half what the nation they want to ban has. Therefore, the more influence a native nation has,
          the harder it is to ban them. Influence in non-frontier regions never decays, so the earlier you start sending and
          receiving endorsements, the more influence you can build up to protect yourself and your region. This technique is
          called an Influence Fortress, and is one of the best methods of ensuring that your region is never destroyed.
        </p>
        <p class="space">
          Be aware that some regions have limits on how many endorsements a nation can legally have. You may wish to check if
          your region is one with such limits.
        </p>
      </details>
    </div>
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
