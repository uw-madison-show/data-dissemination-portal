<!DOCTYPE html>
<html lang="en" class=" is-copy-enabled">
  <head>
    <meta charset='utf-8'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Area for data dissemination from the Survey of the Health of Wisconsin (SHOW).">
    <meta name="author" content="Survey of the Health of Wisconsin">


    <title>SHOW Data</title>


    <link rel="search" type="application/opensearchdescription+xml" href="/opensearch.xml" title="GitHub">

    <!-- Icons -->
    <link rel="fluid-icon" href="" title="SHOW">
    <link rel="apple-touch-icon" sizes="57x57" href="/apple-touch-icon-114.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/apple-touch-icon-114.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/apple-touch-icon-144.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/apple-touch-icon-144.png">
    <meta name="msapplication-TileImage" content="/windows-tile.png">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="selected-link" value="repo_source" data-pjax-transient>
    <link rel="icon" type="image/x-icon" href="https://assets-cdn.github.com/favicon.ico">

    <!-- jQuery -->
    <script src="//code.jquery.com/jquery-2.1.4.min.js"></script>
    
    <!-- Bootstrap -->
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"/>
    
    <!-- CDN fallbacks to local copies -->
    <script>
      if (!window.jQuery) {
        document.write('<script src="./js/jquery-2.1.4.min.js"><\/script>')
      } else {
        var bootstrap_css = false;
        $.each(document.styleSheets, function(i,sheet){
          // alert(sheet.href)
          var pat = new RegExp("maxcdn\.bootstrapcdn\.com/.+/bootstrap.+\.css");
          if (pat.test(sheet.href)) {
            bootstrap_css = true;
          }
        });
        if (!bootstrap_css) {
          $('<link rel="stylesheet" type="text/css" href="./css/bootstrap.min.js" />').appendTo('head');
        }
      }
      
      if (!window.jQuery.fn.modal) {
        document.write('<script src="/js/bootstrap.min.js"><\/script>');
      }
    </script>

    <style type="text/css">
      .top-offset{
        position: relative;
        margin-top: 50px;
      }

    </style>
  </head>
  <body id="page-top" class="index">
    <a href="#start-of-content" tabindex="1" class="accessibility-aid js-skip-to-content">skip to</a>

    <header>
      <nav role="navigation" class="navbar navbar-sm navbar-default navbar-fixed-top">

        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <span class="navbar-brand">SHOW Data Dissemination</span>
        </div>

        <!-- Collection of nav links and other content for toggling -->
        <div id="navbarCollapse" class="collapse navbar-collapse">
          <ul class="nav navbar-nav navbar-right">
            <li class=""><a href="#">Home</a></li>
            <li class=""><a href="./charts">Charts</a></li>
            <li class=""><a href="./codebooks">Codebooks</a></li>
            <li class=""><a href="./documents">Documentation</a></li>
            <li class=""><a href="./contact">Contact</a></li>
          </ul>
        </div>
      </nav>

    </header>

    <div class="container-fluid">
      <div class="row top-offset">
        <div class="col-xs-10">
          <?php

          session_start();

          // have i been submitted?
          $submitted = isset($_POST['signup']);


          // if not submitted then write out form
          if ( !$submitted ) {


            echo '
              <h2>Register</h2>
              <p>We\'ll send you a password so you can access our codebooks. Just fill in the info.</p>
              <form method="post" action="" class="form-horizontal">
                <div class="form-group">
                  <label for="name" class="col-xs-4 control-label">Your Name:</label>
                  <div class="col-xs-4">
                    <input id="name" name="name" type="text" class="form-control" aria-label="Your name">
                  </div>
                </div>

                <div class="form-group">
                  <label for="email" class="col-xs-4 control-label">Email address:</label>
                  <div class="col-xs-4">
                    <input id="email" name="email" type="text" class="form-control" aria-label="Email address. We send the password here.">
                  </div>
                </div>

                <div class="form-group">
                  <label for="affiliation" class="col-xs-4 control-label">Your affiliation or project:</label>
                  <div class="col-xs-4">
                    <input id="affiliation" name="affiliation" type="text" class="form-control" placeholder="e.g. UW-Madison, Physiology" aria-label="Your affiliation">
                  </div>
                </div>

                <div class="form-group">
                  <label for="captcha" class="col-xs-4 control-label">Please type the letters:</label>
                  <div class="col-xs-4">
                    <img src="captcha.php" class="imgcaptcha" alt="Captcha Image" style="float:left;"/>
                    <input id="captcha" name="captcha" type="text" required="required" class="form-control" aria-label="Contact data at show dot wisc dot edu for a password">    
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-xs-offset-4 col-xs-4">
                    <button id="signup-btn" name="signup" type="submit" class="btn btn-large">Request Password</button>
                  </div>
                </div>

              </form>                      
                       
                ';
          }

          // if submitted then validate form and send out emails
          if ( $submitted ) {

            //echo 'hello world';

             
            

            // test if captcha is correct
            if ( !(strtoupper($_REQUEST['captcha']) == strtoupper($_SESSION['vercode'])) ) {
              echo '
                <div class="alert alert-warning" role="alert">
                  <p>Sorry, looks like you got those letters and numbers wrong. If you\'re haveing problems reading them, just send as an email to the address [ data at show dot wisc dot edu ], and we\'ll reply with a password.</p>
                </div>
              ';
            } else {
              // echo 'captcha is correct';

              if ( !isset($_POST['name']) ) {
                echo '
                  <div class="alert alert-warning" role="alert">
                    <p>Sorry, I didn\'t get your name.</p>
                  </div>
                ';
              } elseif ( !isset($_POST['email']) ) {
                echo '
                  <div class="alert alert-warning" role="alert">
                    <p>Sorry, I can\'t send you a password if you leave the email blank.</p>
                  </div>
                ';              
              } elseif ( !isset($_POST['affiliation']) ) {
                echo '
                  <div class="alert alert-warning" role="alert">
                    <p>I know it seems silly, but we like to keep track of where people are from. Please enter an affiliation of some type. Thanks.</p>
                  </div>
                ';              
              } else {
                // test if email is ok
                $valid_email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
                if ( $valid_email == false ) {
                  echo '
                    <div class="alert alert-warning" role="alert">
                      <p>Sorry, the database elves are telling me that the email address you entered is likely bogus.</p>
                    </div>
                  ';
                } else {
                  // send email
                  $to =       $valid_email;
                  $subject =  'Welcome to SHOW\'s Codebooks!';
                  $headers =  'From: data@show.wisc.edu'. "\r\n" .
                              'Reply-To: data@show.wisc.edu' . "\r\n".
                              'X-Mailer: PHP/'. phpversion();

                  $message =  'Hi ' . htmlentities($_POST['name']) .',' ."\r\n".
                              'Welcome to SHOW\'s codebooks. We hope you will find them useful in your research. If you have any trouble, please don\'t hesitate to get in touch with any of our data team by sending and email to data@show.wisc.edu. And here is the log in information:'.
                              "\r\n".
                              "\r\n".
                              'Site: www.showcodebook.org'. "\r\n".
                              'User: show'. "\r\n".
                              'Password: transformation'. "\r\n".
                              "\r\n".
                              'Good luck,' ."\r\n".
                              'SHOW Data Team'
                  ;
                  //$message = wordwrap($message, 70, "\r\n");

                  $check = mail($to, $subject, $message, $headers);

                  if( $check == 1 ) {
                    echo '
                      <div class="alert alert-success" role="alert"
                        <p>We just sent an email to '. $to . '. Double check your junk mail folder if you can\'t find it right away.</p>
                      </div>
                     ';
                  } else {
                    echo '
                      <div class="alert alert-warning" role="alert">
                        <p>Sorry, something went wrong with our email machine. Please let us know about this issue by sending us an email at the address [ data at show dot wisc dot edu ].</p>
                      </div>
                    ';
                  }

                }
              } // end if for checking valid inputs
              
            } // end if for checking captcha

              // echo('<pre>');
              // $all_vars = get_defined_vars();
              // print_r($all_vars);
              // echo('</pre>');

          } // end if submitted


          ?>
        </div>
      </div>
    </div>
  </body>
</html>

