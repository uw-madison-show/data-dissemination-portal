<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en" class=" is-copy-enabled">
  <head>
    <?php include '../head.php'; ?>
  </head>
  <body id="page-top" style="padding-top: 55px;">
    <a href="#content" class="sr-only">skip to content</a>

    <header>
      <?php include '../navbar.php'; ?>
    </header>

    <div class="container-fluid">
      <div class="row">
        <div class="col-xs-12">
          <div class="row">
            <div class="col-xs-8 col-md-offset-2">
              <h2>Oops. Sorry about that.</h2>
              <p>You are reading this because our server says you don't have access to the requested page.</p>
              <p>If you are trying to read our codebooks and metadata, you may need to register by filling in your contact info on <a href="/data/registration.php">our registration page.</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <?php include( './includes/footer.php' ); ?>

  </body>
</html>

