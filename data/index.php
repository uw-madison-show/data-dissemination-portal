<!DOCTYPE html>
<html lang="en" class=" is-copy-enabled">
  <head>
    <?php 
      $include_folder = $_SERVER['DOCUMENT_ROOT'] . '/data/includes/';
      include( ($include_folder . 'head.php') ); 
    ?>
  </head>
  <body id="page-top" style="padding-top: 55px;">
    <a href="#content" class="sr-only">skip to content</a>

    <header>
      <?php include( ($include_folder . 'navbar.php') ); ?>
    </header>

    <div id="content" class="container-fluid">
      <div class="row">
        <div class="col-xs-8 col-xs-offset-2">
        <div class="well well-lg">

          <h1><a href="/data/charts/">Charts</a></h1>

          <p>
            We make some interactive graphs and maps to help visualize the regional variation in our most popular health measures. While the visualizations don't cover all of SHOW's variables, researchers can start here to get an idea of population averages for obesity, asthma, hypertension, flu shots, and over 50 other variables.
          </p>

          <h1><a href="/data/codebooks/">Codebooks</a></h1>

          <p>
            This is the core metadata on every single variable collected by SHOW. The 4,000 variables are grouped by instruments and displayed across years. Each variable shows the full text of the question and the frequencies of the response options. Every researcher should look at the codebooks to find out the precise details of all our data cleaning efforts. The codebook section is password protected, but our computer elves will be more than happy to <a href="registration.php">automatically email you a password</a>.
          </p>

          <h1><a href="/data/contact/">Contact</a></h1>

          <p>
            Not finding what you need? Drop an email to <a id="data_addy" href="#">data at show dot wisc dot edu</a> or <a href="/data/contact/">contact a data expert directly</a>.
          </p>
        </div>
      </div>
     </div> 
    </div>
    <?php include( ($include_folder . 'footer.php') ); ?>
    <script type="text/javascript">
      $(document).ready(function(){
        // Email address obfusication
        $('#data_addy')
          .click( function() {
            var a = 'data', b = 'show.wisc.edu';
            window.location.href = 'mailto:' + a + '@' + b;
          });
      });
    </script>
  </body>
</html>
