<!DOCTYPE html>
<html lang="en" class=" is-copy-enabled">
  <head>

    <?php
      $include_folder = $_SERVER['DOCUMENT_ROOT'] . '/data/includes/';
      include( $include_folder . 'head.php' );

      // Get this scripts folder
      $this_script    = basename(__FILE__);
    ?>

  </head>
  <body id="page-top" style="padding-top: 55px;">
    <a href="#content" class="sr-only">skip to content</a>

    <header>
      <?php include( ($include_folder . 'navbar.php') ); ?>
    </header>

    <div class="container-fluid">
      <div class="row" >
        <div class="col-xs-8 col-offset-xs-2">
          <h1>hello world</h1>

          <?php include 'listr-functions.php'; ?>

          <table id="bs-table" class="table table-hover">
            <thead>
              <tr>
                <?php echo $table_header ?>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <td colspan="<?php echo $table_count + 1; ?>">
                <small class="pull-left text-muted" dir="ltr">
                  <?php echo $summary ?>
                </small>
                </td>
              </tr>
            </tfoot>
            <tbody>
              <?php echo $table_body ?>
            </tbody>
          </table>

        </div>
      </div>
    </div>

    <!-- file display -->
    <div class="modal fade" id="viewer-modal" tabindex="-1" role="dialog" aria-labelledby="file-name" aria-hidden="true">
      <div class="modal-dialog <?php echo $modal_size ?>">
        <div class="modal-content">
          <div class="modal-header">  
          </div>
          <div class="modal-body">
          </div>
          <div class="modal-footer">
          </div>
        </div>
      </div>
    </div>

  </body>

  <pre>
    <?php
      $vars = get_defined_vars();
      print_r($vars);
    ?>
  </pre>

</html>