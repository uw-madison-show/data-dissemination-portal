<!DOCTYPE html>
<html lang="en" class=" is-copy-enabled">
  <head>
    <?php include './includes/head.php'; ?>
  </head>
  <body id="page-top" style="padding-top: 55px;">
    <a href="#content" class="sr-only">skip to content</a>

    <header>
      <?php include './includes/navbar.php'; ?>
    </header>


    <div class="container-fluid">
      <div class="row">
        <div class="col-xs-12">
          <?php

          session_start();

          // have i been submitted?
          $submitted = isset($_POST['signup']);


          // if not submitted then write out form
          if ( !$submitted ) {


            echo '
              <div class="row">
                <div class="col-xs-8 col-md-offset-2">
                  <h2>Register</h2>
                  <p>We\'ll send you a password so you can access our codebooks. Just fill in the info.</p>
                </div>
              </div>

              <div class="row">
                <div class="col-xs-12">
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
                        <img src="./includes/captcha.php" class="imgcaptcha" alt="Captcha Image" style="float:left;"/>
                        <input id="captcha" name="captcha" type="text" required="required" class="form-control" aria-label="Contact data at show dot wisc dot edu for a password">    
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="col-xs-offset-4 col-xs-4">
                        <button id="signup-btn" name="signup" type="submit" class="btn btn-large">Request Password</button>
                      </div>
                    </div>

                  </form>
                </div>
              </div>                
                       
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

