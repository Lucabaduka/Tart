<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="keywords" content="Endotart, NationStates endorse, NationStates endorsement, NationStates influence"/>
  <meta name="description" content="Tart.CalRef is a fast and easy web utility to help you endorse Word Assembly members in your region.">
  <meta name="theme-color" content="#0099FF">
  <meta id="nations_list" data-values="<?=$endos->links()?>">
  <meta property="og:image" content="/Static/tart.png">
  <link rel="icon" type="image/x-icon" href="/favicon.ico">
  <link rel="stylesheet" href="/Static/tart-min.css">
  <title>Tart - Sheet for <?=$nation?></title>
</head>
<body>

<div class="hero is-fullheight">

  <!-- Nav Bar -->
  <?php include "nav.php"; ?>

  <!-- Main Section -->

  <main class="hero-body">

    <div class="container outline" style="max-width: 95%;">

      <!-- Auto Feeder -->

      <section class="is-fullhd subbox mb-4">
        <article class="media has-text-left">
          <figure class="image depth mslim is-64x64">
              <a href="/"><img src ="/Static/tart_logo.svg" alt="logo" aria-label="Return to splash page"></a>
          </figure>
          <div class="media-content mb-2">
            <h1 class="title pl-1 m-0 is-3 blue">
                Endotarting Sheet for <?=$nation?>
            </h1>
            <div class="pl-2">
              <p>If you use <b style="color: #ffd700;">Chrome</b> or <b style="color: #3a8cdf;">Edge</b>, you can ctrl+click this massive button to open all nations in a new page.</p>
              <p>If you use <b style="color: #ff8c00;">Firefox</b>, the best you can do is left-click, back button, left-click.</p>
            </div>
          </div>
        </article>

        <hr>

        <div class="space is-flex">

          <div class="columns is-multiline is-fullwidth">

            <div class="column is-one-third">
              <div class="inbox is-flex" style="height: 100%;">
                <div class="is-pulled-left">
                  <span class="ml-1"> </span>
                  <span class="is-size-2">
                    <span style="background-color:#0099FF">
                      <span class="ml-1"></span>
                    </span>
                  </span>
                  <span class="ml-2"></span>
                </div>
                <p class="center is-fullwidth">
                  <i>This data updates daily as a component of Nightly</i><br>
                    <b>Updated <?=$time->Stamp()?></b>
                  </p>
              </div>
            </div>

            <div class="column is-one-third">
              <a class="button tall is-block is-info is-large" href="#feeder" id="feeder" onclick="feeder()"><p>Assisted Link Opener</p>
              <p>Remaining: <?=count($endos->missing())?></p>
              </a>
            </div>

            <!-- Produce a Delegate button, if needed -->
            <div class="column is-one-third">
              <?php

                if ($df[$region]["delegate"] !== null):
                  $delegate = $df[$region]["delegate"];
                  if (in_array($delegate, $endos->missing())):

              ?>
              <a class="button stack" href="https://www.nationstates.net/nation=<?=cleanName($delegate)?>#composebutton" onclick="okay(this);">
                <p class="is-size-4">
                  <b><?=$delegate?></b><br>
                  Endorse the Delegate!
                </p>
              </a>
              <?php

                endif;
              endif;

              ?>
            </div>
          </div>
        </div>
      </section>

      <!-- Produce any manual nation links needed -->

      <div class="is-fullhd subbox">
        <h1 class="title is-3">
          <span class="blue space pr-1">Full List</span>
        </h1>
        <h2 class="pl-3">
          You can also manually open each nation individually here. Buttons will change to green when you've control+clicked them so you don't lose your progress.
        </h2>

        <hr class="my-4">

        <div class="columns is-multiline">
          <?php

            foreach ($endos->missing() as $link):
              if ($link !== $df[$region]["delegate"]):

          ?>
            <div class="column is-one-fifth">
              <a class="button is-medium is-info is-fullwidth" href="https://www.nationstates.net/nation=<?=cleanName($link)?>#composebutton" onclick="okay(this);">
                <p class="btext">
                  <?=$link?>
                </p>
              </a>
          </div>
          <?php

            endif;
          endforeach;

          ?>
        </div>
      </div>
    </div>

  </main>

  <!-- Footer -->
  <?php include "footer.php"; ?>

</div>

<script src="/Static/butter.js"></script>

</body>
</html>