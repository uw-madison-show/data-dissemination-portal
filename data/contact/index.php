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
          <p>Email the general data team: <a id="data_addy" href="#">data at show dot wisc dot edu</a></p>
          <p>
            Or email one of our data experts directly...
            <ul>
              <li><div class="mjm-tooltip"><a id="tammy_addy" href="#">Tammy LeCaire</a>, Associate Director<span class="mjm-tooltip-text""></span></div></li>
              <li><div class="mjm-tooltip"><a id="maria_addy" href="#">Maria Nikodemova</a>, Research and Grant Facilitator<span class="mjm-tooltip-text""></span></div></li>
              <li><div class="mjm-tooltip"><a id="andy_addy" href="#">Andy Bersch</a>, Biostatistician<span class="mjm-tooltip-text""></span></div></li>
              <li><div class="mjm-tooltip"><a id="matt_addy" href="#">Matt Moehr</a>, Database Administrator<span class="mjm-tooltip-text""></span></div></li>
            </ul>
          </p>
          <p>Or for general questions about SHOW see our <a href="http://www.med.wisc.edu/show/contact-us/37496">contact page</a> on the public website.</p>
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
        $('#tammy_addy')
          .click( function() {
            var a = 'tjlecaire', b = 'show.wisc.edu';
            window.location.href = 'mailto:' + a + '@' + b;
          })
          .hover( function() {
            var a = 'tjlecaire', b = 'show.wisc.edu';
            $(this).parent().children('.mjm-tooltip-text').html(a + '@' + b);
          });
        $('#maria_addy')
          .click( function() {
            var a = 'mnikodemova', b = 'wisc.edu';
            window.location.href = 'mailto:' + a + '@' + b;
          })
          .hover( function() {
            var a = 'mnikodemova', b = 'wisc.edu';
            $(this).parent().children('.mjm-tooltip-text').html(a + '@' + b);
          });
        $('#andy_addy')
          .click( function() {
            var a = 'abersch', b = 'show.wisc.edu';
            window.location.href = 'mailto:' + a + '@' + b;
          })
          .hover( function() {
            var a = 'abersch', b = 'show.wisc.edu';
            $(this).parent().children('.mjm-tooltip-text').html(a + '@' + b);
          });
        $('#matt_addy')
          .click( function() {
            var a = 'moehr', b = 'show.wisc.edu';
            window.location.href = 'mailto:' + a + '@' + b;
          })
          .hover( function() {
            var a = 'moehr', b = 'show.wisc.edu';
            $(this).parent().children('.mjm-tooltip-text').html(a + '@' + b);
          });
      });
    </script>
  </body>
</html>