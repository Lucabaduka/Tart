<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="keywords" content="Endotart, NationStates endorse, NationStates endorsement, NationStates influence"/>
  <meta name="description" content="Tart.CalRef is a fast and easy web utility to help you endorse Word Assembly members in your region.">
  <meta name="theme-color" content="#0099FF">
  <meta property="og:image" content="/Static/tart.png">
  <link rel="icon" type="image/x-icon" href="/favicon.ico">
  <link rel="stylesheet" href="/Static/tart-min.css">
  <title>Tart - <?=$title?></title>
</head>
<body>

<div class="hero is-fullheight">

  <!-- Nav Bar -->
  <?php include "nav.php"; ?>

  <!-- Main Page Template -->
  <main class="hero-body splash">
    <section class="hero-body px-2">
      <div class="container outline">
      <div class="subbox">

        <article class="media has-text-left">
          <figure class="image is-64x64">
            <a href="/"><img src="/Static/tart_logo.svg" alt="logo" aria-label="Return to splash page"></a>
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
  <?php include "footer.php"; ?>

</div>

</body>
</html>