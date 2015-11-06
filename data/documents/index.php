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
        <div class="col-xs-8">
          <h3>Documentation</h3>
          <p>
            This repository contains information about SHOW's samples, data cleaning, and procedures for analyzing the data. Please do not cite or distribute without first getting permission from us. Let us know if you have any questions by emailing data at show dot wisc dot edu.
          </p>
        </div>
      </div>

      <div class="row">
        <div class="col-xs-8">


  
  <?php
    // dir listing code stolen from https://github.com/ael-code/dir-listing-bootstrap
    // Matt Moehr 2015-11-06

    require 'dir_listing_func.php';
    include 'dir_listing_config.php';

    function dump_vars($vars) {
      echo '<pre>';
      print_r($vars);
      echo '</pre>';
    }

    //PATH

      // folder that you want people to browse, relative to this script
      $public_file_folder = 'public-files/';
      // ways to get to this script
      $directory_listing_script = array('/data/documents/', 
                                        '/data/documents/index.php'
                                        );

      $path = $_SERVER['REQUEST_URI'];
      $doc_root = $_SERVER['DOCUMENT_ROOT'];
      //remove last '/' from doc_root if exist
      if($doc_root[strlen($doc_root)-1]=='/')
        $doc_root = substr($doc_root,0,strlen($doc_root)-1);

      // test if i the request was for a folder or the index script
      if ( in_array($_SERVER['REQUEST_URI'], $directory_listing_script) ) {
        // append the public file folder to all the path vars
        $path = $path . $public_file_folder;
      }
      //Substitute %xx characters
      $path = rawurldecode($path);
      //Create full path
      $full_path = $_SERVER['DOCUMENT_ROOT'].$path;

    //END PATH

    //BREADCRUMB

      $folders = explode('/',$path);
      $parents = count($folders) - 2;

      echo "<div class='container navbar'>" . PHP_EOL;
      echo "<ol class='breadcrumb'>" . PHP_EOL;

      //assume a blank array element 
      for ( $i = 0; $i < $parents; ++$i ) {
        echo "<li><a href='";
        for($j = 0; $j < ($parents - $i); ++$j ) {
          echo '../';
        }
        echo "'>" . htmlentities( $folders[$i] )."</a></li>";
      }

      //this folder
      echo "      <li class='active'>".htmlentities($folders[$parents])."</li>\n";
      echo "      </ol>\n";
      echo "    </div>\n";


    //END_BREADCRUMB

//TABLE

  $dir_handle = opendir($full_path);
  
  //error opening folder
  if($dir_handle == false){
    echo "<br><br><div class='container'><div class='alert alert-danger text-center'><strong>Error!</strong> failed to open folder </div></div>\n";
    // dump_vars(get_defined_vars());
    break;
  }
  
  $folderlist = array();
  $filelist = array();
    
  while( false !== ($entry = readdir($dir_handle))){
    
    //skip hidden files(optional), current folder ".", parent folder ".."
    if ( ( strpos($entry,'.') === 0 ) | $entry == "." | $entry == ".." ) {
      continue;
    }else if ( is_dir( $full_path.$entry ) ) {
      $folderlist[] = $entry;  
    }else{
      $filelist[] = $entry;
    }
  }
  
  //order folder and files
  sort($folderlist);
  sort($filelist);
  
  //foldere is empty
  if(count ($folderlist) == 0 and count ($filelist) == 0){
    echo '<br><br><div class="container"><div class="alert alert-info text-center"><strong>This folder is empty</strong></div></div>';
    // dump_vars(get_defined_vars());
    break;
  }
  
  //print files table  
    //print header
    echo'
    <div class="container">
      <table class="table table-condensed table-hover">
      <thead>
        <th width="35"></th>
        <th class="text-primary">Name</th>
        <th width="89" class="text-primary text-center">Size</th>
        <th class="text-primary text-center">Last modified</th>
      </thead>'
    ;
     
     //print folder
    foreach ($folderlist as $val) {
      echo '
      <tr>
        <td><span class="glyphicon glyphicon-folder-open"></span></td>
        <td><a href="' .$path .rawurlencode($val).'">' . htmlentities($val).'</td>
        <td class="text-center">-</td>
        <td>-</td>
      </tr>';
    }
  
    //print file
    foreach ($filelist as $val) {
    echo '
      <tr>
        <td><span class="glyphicon '.choose_icon($val).'"></span></td>
        <td><a href="' .$path .rawurlencode($val).'">'.htmlentities($val).'</td>
        <td class="text-right">'. format_bytes(get_file_size($full_path.$val)) .'</td>
        <td class="text-center"><small>'. date('M d Y', filectime($full_path.$val)) .'</small></td>
      </tr>';    
    }

    echo '
      </table>
    </div>'. PHP_EOL;
  //end files table print
  
?>
        </div>
      </div>
    </div>

    <!-- <?php dump_vars(get_defined_vars()); ?> -->

  </body>
</html>
