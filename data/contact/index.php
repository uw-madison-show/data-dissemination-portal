<!DOCTYPE html>
<html>
  <head>
    <?php
      $include_folder = $_SERVER['DOCUMENT_ROOT'] . '/data/includes/';
      include( $include_folder . 'head.php' );
    ?>
    
  </head>
  <!--page content-->
  <body id="page-top" style="padding-top: 55px;">
    <a href="#content" class="sr-only">skip to content</a>

    <header>
      <?php include( ($include_folder . 'navbar.php') ); ?>
    </header>

    <div class="container-fluid">
      <div class="row">
        <div class="col-xs-6 col-xs-offset-3">
          <p>
            We're always happy to meet with students, faculty, and public health officers. Please get in touch if you have any questions about our data or if you have an idea for a new research project.
          </p>
          <p>email the general data team: </p>
          <p>email our associate director: </p>
          <p>email our research and grant facilitator: </p>
          <p>email our biostatistician: </p>
          <p>email our database administrator: </p>
          <p>call the main show number and ask for Tammy, Maria, Andy, or Matt: </p>
          <p>for general questions about show see our contact page on the public website.</p>
        </div>
      </div>
    </div>

    <?php include( ($include_folder . 'footer.php') ); ?>
  </body>
</html>