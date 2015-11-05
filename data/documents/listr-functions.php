<?php
// see readme.md
// stolen from https://github.com/idleberg/Bootstrap-Listr/releases/tag/2.2.4
// heavily changed by Matt Moehr 2015-04-11


/*** FUNCTIONS ***/

function set_bootstrap_theme() {

    global $options;
    
    $bootswatch = array('amelia','cerulean','cosmo','cyborg','darkly','flatly','journal','lumen','paper','readable','sandstone','simplex','slate','spacelab','superhero','united','yeti');

    if (in_array($options['bootstrap']['theme'], $bootswatch)) {
        return str_replace("%theme%",$options['bootstrap']['theme'],$options['assets']['bootswatch_css']);
    } else if ($options['bootstrap']['theme'] == "m8tro" ) {
        return $options['assets']['m8tro_css'];
    } else {
        return $options['assets']['bootstrap_css'];
    }
}

// Set header
// function set_header($bootstrap_css) {

//     global $options;
    
//     if ($options['general']['custom_title'] === null) {
//         $server  = $_SERVER['HTTP_HOST'];
//         $request = htmlentities(urldecode($_SERVER['REQUEST_URI']), ENT_QUOTES, 'utf-8');
//         $folder  = basename($server.$request);
//         $index = "Index of $folder";
//     } else {
//         $index   = $options['general']['custom_title'];
//     }
//     $header  = "  <meta charset=\"utf-8\">" . PHP_EOL;
//     $header .= "  <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">" . PHP_EOL;
//     $header .= "  <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0, user-scalable=yes\">" . PHP_EOL;
//     $header .= "  <meta name=\"generator\" content=\"Bootstrap Listr\" />" . PHP_EOL;
//     $header .= "  <title>".$index."</title>" . PHP_EOL;

//     // Set iOS touch icon sizes (https://developer.apple.com/library/ios/documentation/UserExperience/Conceptual/MobileHIG/IconMatrix.html)
//     if ($options['icons']['ios_version'] >= 7) {
//         $size_iphone        = "60x60";
//         $size_ipad          = "76x76";
//         $size_iphone_retina = "120x120";
//         $size_ipad_retina   = "152x152";
//     } else {
//         $size_iphone        = "57x57";
//         $size_ipad          = "72x72";
//         $size_iphone_retina = "114x114";
//         $size_ipad_retina   = "144x144";
//     }

//     if ($options['icons']['fav_icon']) $header .= "  <link rel=\"shortcut icon\" href=\"".$options['icons']['fav_icon']."\" />" . PHP_EOL;
//     if ($options['icons']['iphone']) $header .= "  <link rel=\"apple-touch-icon\" sizes=\"".$size_iphone."\" href=\"".$options['icons']['iphone']."\" />" . PHP_EOL;
//     if ($options['icons']['ipad']) $header .= "  <link rel=\"apple-touch-icon\" sizes=\"".$size_ipad."\" href=\"".$options['icons']['ipad']."\" />" . PHP_EOL;
//     if ($options['icons']['iphone_retina']) $header .= "  <link rel=\"apple-touch-icon\" sizes=\"".$size_iphone_retina."\" href=\"".$options['icons']['iphone_retina']."\" />" . PHP_EOL;
//     if ($options['icons']['ipad_retina']) $header .= "  <link rel=\"apple-touch-icon\" sizes=\"".$size_ipad_retina."\" href=\"".$options['icons']['ipad_retina']."\" />" . PHP_EOL;
//     if ($options['icons']['metro_tile_color']) $header .= "  <meta name=\"msapplication-TileColor\" content=\"#".$options['icons']['metro_tile_color']."\" />" . PHP_EOL;
//     if ($options['icons']['metro_tile_image']) $header .= "  <meta name=\"msapplication-TileImage\" content=\"".$options['icons']['metro_tile_image']."\" />" . PHP_EOL;
//     if ($options['opengraph']['title']) $header .= "  <meta property=\"og:title\" content=\"".$options['opengraph']['title']."\" />" . PHP_EOL;
//     if ($options['opengraph']['description']) $header .= "  <meta property=\"og:description\" content=\"".$options['opengraph']['description']."\" />" . PHP_EOL;
//     if ($options['opengraph']['site_name']) $header .= "  <meta property=\"og:site_name\" content=\"".$options['opengraph']['site_name']."\" />" . PHP_EOL;

//     if ($options['keys']['google_analytics'] !== null ) {
//         $header .= "  <script type=\"text/javascript\">var _gaq=_gaq||[];_gaq.push([\"_setAccount\",\"".$options['keys']['google_analytics']."\"]);_gaq.push([\"_trackPageview\"]);(function(){var ga=document.createElement(\"script\");ga.type=\"text/javascript\";ga.async=true;ga.src=(\"https:\"==document.location.protocol?\"https://ssl\":\"http://www\")+\".google-analytics.com/ga.js\";var s=document.getElementsByTagName(\"script\")[0];s.parentNode.insertBefore(ga,s)})();</script>" . PHP_EOL;
//     }

//     $protocol = get_protocol();
//     $server = get_server();

//     if ($options['general']['concat_assets'] === true) {
//         $header    .= "  <link rel=\"stylesheet\" href=\"".$protocol.$_SERVER['SERVER_NAME'].dirname($_SERVER['PHP_SELF'])."/assets/css/listr.pack.css\" />" . PHP_EOL;
//     } else {

//         // Font Awesome CSS
//         if (  $options['bootstrap']['icons'] == 'fontawesome' || $options['bootstrap']['icons'] == 'fa' || $options['bootstrap']['icons'] == 'fa-files'  ) {
//             $header .= "  <link rel=\"stylesheet\" href=\"" .$server.$options['assets']['font_awesome'] . "\" />". PHP_EOL;
//         }

//         // Bootstrap CSS
//         $header .= "  <link rel=\"stylesheet\" href=\"$server$bootstrap_css\" />" . PHP_EOL;

//         // Highlight.js CSS
//         if ( ($options['general']['enable_viewer']) && ($options['general']['enable_highlight'] === true) ) {
//             $highlight_css = str_replace("%theme%",$options['highlight']['theme'],$options['assets']['highlight_css']);
//             $header .= "  <link rel=\"stylesheet\" href=\"$server$highlight_css\" />" . PHP_EOL;
//         }

//         // Listr CSS
//         $header .= "  <link rel=\"stylesheet\" href=\"".$protocol.$_SERVER['SERVER_NAME'].dirname($_SERVER['PHP_SELF'])."/assets/css/listr.min.css\" />" . PHP_EOL;
//     }

//     // Append CSS
//     foreach($options['assets']['append_css'] as $append_css) {
//         if ($append_css !== null) {
//             $header .= "  <link rel=\"stylesheet\" href=\"$server$append_css\" />" . PHP_EOL;
//         }
//     }

//     if ($options['assets']['google_font']) {
//         $header .= "  <link href=\"".$options['assets']['google_font']."\" rel=\"stylesheet\" type=\"text/css\">" . PHP_EOL;
//     }

//     return $header;

// }

// Set HTML footer
// function set_footer(){

//     $footer = null;
//     global $options;

//     $server =  get_server();

//     // jQuery
//     if ( ($options['general']['enable_sort']) || ($options['general']['enable_viewer']) ) {
//         $footer .= "  <script type=\"text/javascript\" src=\"" .$server.$options['assets']['jquery_js'] . "\"></script>" . PHP_EOL;
//     }

//     // Dropbox Dropins
//     if( ($options['general']['enable_viewer']) && ($options['general']['share_button']) && ($options['keys']['dropbox'] !== null ) ){
//         $footer .= "  <script type=\"text/javascript\" src=\"https://www.dropbox.com/static/api/2/dropins.js\" id=\"dropboxjs\" data-app-key=\"" . $options['keys']['dropbox'] . "\"></script>" . PHP_EOL;
//     }

//     $protocol = get_protocol();

//     if ($options['general']['concat_assets'] === true) {
//         $footer    .= "  <script type=\"text/javascript\" src=\"".$protocol.$_SERVER['SERVER_NAME'].dirname($_SERVER['PHP_SELF'])."/assets/js/listr.pack.js\"></script>" . PHP_EOL;
//     } else {

//         // Stupid Table
//         if ( ($options['general']['enable_sort'] === true) && ($options['assets']['stupid_table']) ) {
//            $footer .= "  <script type=\"text/javascript\" src=\"" .$server.$options['assets']['stupid_table'] . "\"></script>" . PHP_EOL;
//         }

//         // jQuery Searcher
//         if ( ($options['general']['enable_search'] === true) && ($options['assets']['jquery_searcher']) ) {
//             $footer .= "  <script type=\"text/javascript\" src=\"" .$server.$options['assets']['jquery_searcher'] . "\"></script>" . PHP_EOL;
//         }

//         // Modal Viewer
//         if ($options['general']['enable_viewer'] === true) {
//             $footer .= "  <script type=\"text/javascript\" src=\"" .$server.$options['assets']['bootstrap_js'] . "\"></script>" . PHP_EOL;

//             // Highlighter.js
//             if ( ($options['general']['enable_highlight'] === true) && ($options['assets']['highlight_css']) && ($options['assets']['highlight_js']) ) {
//                 $footer .= "  <script type=\"text/javascript\" src=\"" .$server.$options['assets']['highlight_js'] . "\"></script>" . PHP_EOL;
//             }
//         }
        
//         $footer .= "  <script type=\"text/javascript\" src=\"".$protocol.$_SERVER['SERVER_NAME'].dirname($_SERVER['PHP_SELF'])."/assets/js/listr.min.js\"></script>" . PHP_EOL;
//     }

//     // Append JS
//     foreach($options['assets']['append_js'] as $append_js) {
//         if ($append_js !== null) {
//             $footer .= "  <script type=\"text/javascript\" src=\"$server$append_js\"></script>" . PHP_EOL;
//         }
//     }

//     // Bootlint
//     if ($options['debug']['bootlint'] === true) {
//         $footer .= "  <script type=\"text/javascript\" src=\"" .$server.$options['assets']['bootlint'] . "\"></script>" . PHP_EOL;
//     }

//     return $footer;
// }

function get_protocol() {
    if ($_SERVER['HTTPS']) {
        return "https://";
    } else {
        return "http://";
    }
}

function get_server() {

    global $options;

    $protocol = get_protocol();

    if ($options['general']['local_assets'] === true) {
        return $protocol.$_SERVER['SERVER_NAME'].dirname($_SERVER['PHP_SELF'])."/";
    } else {
        return null;
    }
}

function load_iconset($input = "glyphicon") {

    // Allow icon aliases
    if ( $input === 'fontawesome' || $input === 'fa' ) {
        $input = "fa";
    } else if ($input === 'glyphicon') {
        $input = "glyphicons";
    }

    // Does icon set exist?
    if( file_exists('themes/'.$input.'.json')) {
        $iconset = json_decode(file_get_contents('themes/'.$input.'.json'), true);
        return $iconset;
    } else {
        throw new Exception($input.'.json not found');
    }
}

function set_404_error() {
    header('HTTP/1.0 404 Not Found');
    echo "404 &mdash; Page not found";
}

function utf8ify($str) {
    if (is_file(!utf8_decode($str))) {
        return utf8_encode($str);
    } else {
        return $str;
    }
}

/**
 *    http://us.php.net/manual/en/function.array-multisort.php#83117
 */
function php_multisort($data,$keys)
{
    foreach ($data as $key => $row)
    {
        foreach ($keys as $k)
        {
            $cols[$k['key']][$key] = $row[$k['key']];
        }
    }
    $idkeys = array_keys($data);
    $i=0;
    $sort = null;
    foreach ($keys as $k)
    {
        if($i>0){$sort.=',';}
        $sort.='$cols['.$k['key'].']';
        if(isset($k['sort'])){$sort.=',SORT_'.strtoupper($k['sort']);}
        if(isset($k['type'])){$sort.=',SORT_'.strtoupper($k['type']);}
        $i++;
    }
    $sort .= ',$idkeys';
    $sort = 'array_multisort('.$sort.');';
    eval($sort);
    foreach($idkeys as $idkey)
    {
        $result[$idkey]=$data[$idkey];
    }
    return $result;
} 

/**
 *    @ http://us3.php.net/manual/en/function.filesize.php#84652
 */
function bytes_to_string($size, $precision = 0) {
    $sizes = array('YB', 'ZB', 'EB', 'PB', 'TB', 'GB', 'MB', 'KB', 'bytes');
    $total = count($sizes);
    while($total-- && $size > 1024) $size /= 1024;
    $return['num'] = round($size, $precision);
    $return['str'] = $sizes[$total];
    return $return;
}

/**
 *    @ http://css-tricks.com/snippets/php/time-ago-function/
 */
function time_ago($tm,$rcs = 0) {
    $cur_tm = time(); $dif = $cur_tm-$tm;
    $pds = array('second','minute','hour','day','week','month','year','decade');
    $lngh = array(1,60,3600,86400,604800,2630880,31570560,315705600);
    for($v = sizeof($lngh)-1; ($v >= 0)&&(($no = $dif/$lngh[$v])<=1); $v--); if($v < 0) $v = 0; $_tm = $cur_tm-($dif%$lngh[$v]);

    $no = floor($no); if($no <> 1) $pds[$v] .='s';
    $x=sprintf(sprintf('%%d %s ago', $pds[$v]), $no);
    if(($rcs == 1)&&($v >= 1)&&(($cur_tm-$_tm) > 0)) $x .= time_ago($_tm);
    return $x;
}

/**
 *    @ http://teddy.fr/2007/11/28/how-serve-big-files-through-php/
 */

// Read a file and display its content chunk by chunk
function readfile_chunked($filename, $retbytes = TRUE) {
    $chunksize = 1024*1024;
    $buffer = '';
    $count =0;
    // $handle = fopen($filename, 'rb');
    $handle = fopen($filename, 'rb');
    if ($handle === false) {
      return false;
    }
    while (!feof($handle)) {
      $buffer = fread($handle, $chunksize);
      echo $buffer;
      ob_flush();
      flush();
      if ($retbytes) {
        $count += strlen($buffer);
      }
    }
    $status = fclose($handle);
    if ($retbytes && $status) {
      return $count; // return num. bytes delivered like readfile() does.
    }
    return $status;
}





/*****************************/
/*
/*
/*
/*
/*

// this is where the code actually starts doing stuff

/*
/*
/*
/*
/*
/*****************************/







$options['hidden_files'] = array();


// Configure optional table columns
$table_options['size'] = TRUE;
$table_options['age'] = TRUE;

// Set sorting properties.
$sort = array(
    array('key'=>'lname', 'sort'=>'asc'), // ... this sets the initial sort "column" and order ...
    array('key'=>'size',  'sort'=>'asc') // ... for items with the same initial sort value, sort this way.
);

// Files you want to hide from the listing
$ignore_list = array();

// Get this folder and files name.
$this_script    = basename(__FILE__);

$this_folder    = (isset($_GET['path'])) ? $_GET['path'] : "";
$this_folder    = str_replace('..', '', $this_folder);
$this_folder    = str_replace($this_script, '', $this_folder);
$this_folder    = str_replace('index.php', '', $this_folder);
$this_folder    = str_replace('//', '/', $this_folder);

$navigation_dir = './public-files/' . $this_folder;
$root_dir       = dirname($_SERVER['PHP_SELF']);

$absolute_path  = str_replace(str_replace("%2F", "/", rawurlencode($this_folder)), '', $_SERVER['REQUEST_URI']);
$dir_name       = explode("/", $this_folder);

// Get protocol
// if ($_SERVER['HTTPS']) {
//     $protocol = "https://";
// } else {
//     $protocol = "http://";
// }


if(substr($navigation_dir, -1) != "/"){
    if(file_exists($navigation_dir)){

        // GET MIME 
        $mime_file = finfo_file(finfo_open(FILEINFO_MIME_TYPE), $navigation_dir);
        
        // Direct download
        if($mime_file == "inode/x-empty" || $mime_file == ""){
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="'.basename($navigation_dir).'"');
        }
        // Recognizable mime
        else{
            header('Content-Type: ' . $mime_file);
        }
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Accept-Ranges: bytes');
        header('Pragma: public');
        header('Content-Length: ' . filesize($navigation_dir));
        ob_clean();
        flush();
        if ($options['general']['read_chunks'] == true) { 
            readfile_chunked($navigation_dir);
        } else {
            readfile($navigation_dir);     
        }  
    } else {
        set_404_error();
    }
    exit;
} else {
    if(!file_exists($navigation_dir)){
        set_404_error();
        exit;  
    }
}

// Declare vars used beyond this point.
$file_list = array();
$folder_list = array();
$total_size = 0;


// Load icon set
    try {
        $icons = load_iconset("fa");
    } catch (Exception $e) {
        echo 'Caught exception: ',  $e->getMessage(), "\n";
        die();
    }


// Set icons for included extension
if (!empty($icons['files'])) {
    foreach ($icons['files'] as $type => $ext) {
        foreach ($ext as $k => $v) {
            $filetype[$k]['extensions'] = $v['extensions'];
            $filetype[$k]['icon'] = $v['icon'];
        }
    }
}

switch ($options['bootstrap']['icons']) {
    case "glyphicon":
    case "glyphicons":
        $icons['prefix'] = "glyphicon";
        $icons['home']   = "<span class=\"glyphicon ".$icons['home']."\"></span>";
        $icons['search'] = "          <span class=\"glyphicon ".$icons['search']." form-control-feedback\"></span>" . PHP_EOL;
        $icons['folder'] = 'glyphicon '.$icons['folder'];
        break;
    case "fontawesome":
    case "fa":
    case "fa-files":
        $icons['prefix'] = "fa";
        $icons['home']   = "<i class=\"fa ".$icons['home']." fa-lg fa-fw\"></i> ";
        $icons['search'] = "          <i class=\"fa ".$icons['search']." form-control-feedback\"></i>" . PHP_EOL;
        $icons['folder'] = 'fa '. $icons['folder'].' ' . $options['bootstrap']['fontawesome_style'];
        if ($options['general']['share_icons'] == true) { 
            $icons_dropbox  = "<i class=\"fa fa-dropbox fa-fw\"></i> ";
            $icons_email    = "<i class=\"fa fa-envelope fa-fw\"></i> ";
            $icons_facebook = "<i class=\"fa fa-facebook fa-fw\"></i> ";
            $icons_gplus    = "<i class=\"fa fa-google-plus fa-fw\"></i> ";
            $icons_twitter  = "<i class=\"fa fa-twitter fa-fw\"></i> ";
        }
        break;
    default:
        $icons['home']   = $_SERVER['HTTP_HOST'];
        $icons['search'] = null;
}

if ($options['general']['enable_viewer']) {
    $audio_files     = explode(',', $options['viewer']['audio']);
    $image_files     = explode(',', $options['viewer']['image']);
    $pdf_files       = explode(',', $options['viewer']['pdf']);
    $quicktime_files = explode(',', $options['viewer']['quicktime']);
    $source_files    = explode(',', $options['viewer']['source']);
    $text_files      = explode(',', $options['viewer']['text']);
    $video_files     = explode(',', $options['viewer']['video']);
    $website_files   = explode(',', $options['viewer']['website']);
    if ( ($options['general']['virtual_files'] == true) && ($options['general']['enable_viewer'] == true) ){
        $virtual_files     = explode(',', $options['viewer']['virtual']);
    }
}

if ($options['general']['text_direction'] == 'rtl') {
    $direction     = " dir=\"rtl\"";
    $right         = "left";
    $left          = "right";
    $search_offset = null;
} else {
    $direction     = " dir=\"ltr\"";
    $right         = "right";
    $left          = "left";
    $search_offset = " col-xs-offset-6 col-sm-offset-8 col-md-offset-9";
}

$bootstrap_cdn = set_bootstrap_theme();

// Set Bootstrap defaults
if (isset($options['bootstrap']['body_style'])) {
    $body_style = ' class="' . $options['bootstrap']['body_style'] . '"';
} else {
    $body_style = null;
}

if (isset($options['bootstrap']['container_style'])) {
    $container_style = " ".$options['bootstrap']['container_style'];
} else {
    $container_style = null;
}

if (isset($options['bootstrap']['modal_size'])) {
    $modal_size = $options['bootstrap']['modal_size'];
} else {
    $modal_size = 'modal-lg';
}

if (isset($options['bootstrap']['button_default'])) {
    $btn_default = $options['bootstrap']['button_default'];
} else {
    $btn_default = 'btn-default';
}

if (isset($options['bootstrap']['button_primary'])) {
    $btn_primary = $options['bootstrap']['button_primary'];
} else {
    $btn_primary = 'btn-primary';
}

if (isset($options['bootstrap']['button_highlight'])) {
    $btn_highlight = $options['bootstrap']['button_highlight'];
} else {
    $btn_highlight = 'btn-link';
}

if (isset($options['bootstrap']['column_name'])) {
    $column_name = $options['bootstrap']['column_name'];
} else {
    $column_name = 'col-lg-8';
}

if (isset($options['bootstrap']['column_size'])) {
    $column_size = $options['bootstrap']['column_size'];
} else {
    $column_size = 'col-lg-2';
}

if (isset($options['bootstrap']['column_age'])) {
    $column_age = $options['bootstrap']['column_age'];
} else {
    $column_age = 'col-lg-2';
}

if ($options['bootstrap']['breadcrumb_style'] != "") {
    $breadcrumb_style = " ".$options['bootstrap']['breadcrumb_style'];
} else {
    $breadcrumb_style = null;
}

if ($options['bootstrap']['fluid_grid'] == true) {
    $container = "container-fluid";
} else {
    $container = "container";
}

// Set responsiveness
if ($options['bootstrap']['responsive_table']) {
    $responsive_open = "    <div class=\"table-responsive\">" . PHP_EOL;
    $responsive_close = "    </div>" . PHP_EOL;
}

// Count optional columns
$table_count = 0;
foreach($table_options as $value)
{
  if($value === true)
    $table_count++;
}

// Open the current directory...
if ($handle = opendir($navigation_dir))
{
    // ...start scanning through it.
    while (false !== ($file = readdir($handle)))
    {

        // Make sure we don't list this folder,file or their links.
        if ($file != "." && $file != ".." && $file != $this_script && !in_array($file, $ignore_list) )
        {
            if ( ($options['general']['hide_dotfiles'] == true) && (substr($file, 0, 1) == '.') ) {
                continue;
            }

            // Get file info.
            $info                  =    pathinfo($file);
            // Organize file info.
            $item['name']          =     $info['filename'];
            $item['lname']         =     strtolower($info['filename']);
            $item['bname']         =     $info['basename'];
            $item['lbname']        =     strtolower($info['basename']);

            if (isset($info['extension'])) {
                $item['ext'] = $info['extension'];
            } else {
                $item['ext'] = '.';
            }
            $item['lext'] = strtolower($info['extension']);

            // Assign file icons
            $item['class'] = $icons['prefix'].' '.$icons['default'].' '. $options['bootstrap']['fontawesome_style'];
            
            foreach ($filetype as $v) {
                if (in_array($item['lext'], $v['extensions'])) {
                    $item['class'] = $icons['prefix'].' '.$v['icon'].' '. $options['bootstrap']['fontawesome_style'];
                }
            }


            if ($table_options['size'] || $table_options['age'])
                $stat               =   stat($navigation_dir.$file); // ... slow, but faster than using filemtime() & filesize() instead.

            if ($table_options['size']) {
                $item['bytes']      =   $stat['size'];
                $item['size']       =   bytes_to_string($stat['size'], 2);
            }

            if ($table_options['age']) {
                $item['mtime']      =   $stat['mtime'];
                $item['iso_mtime']  =   gmdate("Y-m-d H:i:s", $item['mtime']);
            }
            
            // Add files to the file list...
            if(is_dir($navigation_dir.$file)){
                array_push($folder_list, $item);
            }
            // ...and folders to the folder list.
            else{
                array_push($file_list, $item);
            }

            // Clear stat() cache to free up memory (not really needed).
            clearstatcache();
            // Add this items file size to this folders total size
            $total_size += $item['bytes'];
        } else if ($file == ".listr") {
            $loptions    = json_decode(file_get_contents($navigation_dir.$file), true);
        }
    }
    // Close the directory when finished.
    closedir($handle);
}
// Sort folder list.
if($folder_list)
    $folder_list = php_multisort($folder_list, $sort);
// Sort file list.
if($file_list)
    $file_list = php_multisort($file_list, $sort);
// Calculate the total folder size (fix: total size cannot display while there is no folder inside the directory)
if($file_list && $folder_list || $file_list)
    $total_size = bytes_to_string($total_size, 2);

$total_folders = count($folder_list);
$total_files = count($file_list);

// Localized summary, hopefully not overly complicated
if ( ($total_folders == 1) && ($total_files == 0) ) {
    $summary = sprintf('%1$s folder', $total_folders);
} else if ( ($total_folders > 1) && ($total_files == 0) ) {
    $summary = sprintf('%1$s folders', $total_folders);
} else if ( ($total_folders == 0) && ($total_files == 1) ) {
    $summary = sprintf('%1$s file, %2$s %3$s in total', $total_files, $total_size['num'], $total_size['str']);
} else if ( ($total_folders == 0) && ($total_files > 1) ) {
    $summary = sprintf('%1$s files, %2$s %3$s in total', $total_files, $total_size['num'], $total_size['str']);
} else if ( ($total_folders == 1) && ($total_files == 1) ) {
    $summary = sprintf('%1$s folder and %2$s file, %3$s %4$s in total', $total_folders, $total_files, $total_size['num'], $total_size['str']);
} else if ( ($total_folders == 1) && ($total_files >1) ) {
    $summary = sprintf('%1$s folder and %2$s files, %3$s %4$s in total', $total_folders, $total_files, $total_size['num'], $total_size['str']);
} else if ( ($total_folders > 1) && ($total_files == 1) ) {
    $summary = sprintf('%1$s folders and %2$s file, %3$s %4$s in total', $total_folders, $total_files, $total_size['num'], $total_size['str']);
} else if ( ($total_folders > 1) && ($total_files > 1) ) {
    $summary = sprintf('%1$s folders and %2$s files, %3$s %4$s in total', $total_folders, $total_files, $total_size['num'], $total_size['str']);
}

// Merge local settings with global settings
if(isset($loptions)) {
    $options = array_merge($options, $loptions);
}


// Set breadcrumbs
$breadcrumbs  = "    <ol class=\"breadcrumb$breadcrumb_style\"".$direction.">" . PHP_EOL;
$breadcrumbs .= "      <li><a href=\"".htmlentities($root_dir, ENT_QUOTES, 'utf-8')."\">".$icons['home']."</a></li>" . PHP_EOL;
foreach($dir_name as $dir => $name) :
    if(($name != ' ') && ($name != '') && ($name != '.') && ($name != '/')):
        $parent = '';
        for ($i = 0; $i <= $dir; $i++):
            $parent .= rawurlencode($dir_name[$i]) . '/';
        endfor;
        $breadcrumbs .= "      <li><a href=\"".htmlentities($absolute_path.$parent, ENT_QUOTES, 'utf-8')."\">".$name."</a></li>" . PHP_EOL;
    endif;
endforeach;
$breadcrumbs = $breadcrumbs."    </ol>" . PHP_EOL;

// Show search
if ($options['general']['enable_search'] == true) {

    $autofocus = null;
    if ($options['general']['autofocus_search'] == true) {
        $autofocus = " autofocus";
    }

    if ($options['bootstrap']['input_size'] != "") {
        $input_size = " ".$options['bootstrap']['input_size'];
    } else {
        $input_size = null;
    }

    $search  = "    <div class=\"row\">" . PHP_EOL;
    $search .= "      <div class=\"col-xs-6 col-sm-4 col-md-3$search_offset\">" . PHP_EOL;
    $search .= "          <div class=\"form-group has-feedback\">" . PHP_EOL;
    $search .= "            <label class=\"control-label sr-only\" for=\"search\">". 'Search'."</label>" . PHP_EOL;
    $search .= "            <input type=\"text\" class=\"form-control$input_size\" id=\"search\" placeholder=\"". 'Search'."\"$autofocus>" . PHP_EOL;
    $search .= $icons['search'];
    $search .= "         </div>" . PHP_EOL; // form-group
    $search .= "      </div>" . PHP_EOL; // col
    $search .= "    </div>" . PHP_EOL; // row
}

// Set table header
$table_header = null;

if ($table_options['count']) {
    $table_header .= "            <th class=\"text-".$right."\" data-sort=\"int\">#</th>" . PHP_EOL;
}

$table_header .= "<th class=\"".$column_name." text-".$left."\" data-sort=\"string\">".'Name'."</th>" . PHP_EOL;

if ($table_options['size']) {
    $table_header .= "            <th";
    if ($options['general']['enable_sort']) {
        $table_header .= " class=\"".$column_size." text-".$right."\" data-sort=\"int\">";
    } else {
        $table_header .= ">";
    }
    $table_header .= 'Size'."</th>" . PHP_EOL;
}

if ($table_options['age']) {
    $table_header .= "            <th";
    if ($options['general']['enable_sort']) {
        $table_header .= " class=\"".$column_age." text-".$right."\" data-sort=\"int\">";
    } else {
        $table_header .= ">";
    }
    $table_header .= 'Modified'."</th>" . PHP_EOL;
}

// Set table body
$table_body = null;

if ($table_options['count']) {
    $row_counter = 1;
}

if(($folder_list) || ($file_list) ) {

    if($folder_list):    
        foreach($folder_list as $item) :

            if ($options['bootstrap']['tablerow_folders'] != null) {
                $tr_folders = ' class="'.$options['bootstrap']['tablerow_folders'].'"';
            } else {
                $tr_folders = null;
            }

            $table_body .= "          <tr$tr_folders>" . PHP_EOL;

            if ($table_options['count']) {
                $table_body .= "            <td class=\"text-muted text-".$right."\" data-sort-value=\"$row_counter\">$row_counter</td>";
            }

            $table_body .= "            <td";
            if ($options['general']['enable_sort']) {
                $table_body .= " class=\"text-".$left."\" data-sort-value=\"". htmlentities(utf8_encode($item['lbname']), ENT_QUOTES, 'utf-8') . "\"" ;
            }
            $table_body .= ">";
            if ($options['bootstrap']['icons'] !== null ) {
                $table_body .= "<".$icons['tag']." class=\"".$icons['folder']."\"></".$icons['tag'].">&nbsp;";
            }

            if ($options['bootstrap']['tablerow_links'] != null) {
                $tr_links = ' class="'.$options['bootstrap']['tablerow_links'].'"';
            } else {
                $tr_links = null;
            }

            $table_body .= "<a href=\"" . htmlentities(rawurlencode($item['bname']), ENT_QUOTES, 'utf-8') . "/\" $tr_links><strong>" . utf8ify($item['bname']) . "</strong></a></td>" . PHP_EOL;
            
            if ($table_options['size']) {
                $table_body .= "            <td";
                if ($options['general']['enable_sort']) {
                    $table_body .= " class=\"text-".$right."\" data-sort-value=\"0\"";
                }
                $table_body .= ">&mdash;</td>" . PHP_EOL;
            }

            if ($table_options['age']) {
                $table_body .= "            <td";
                if ($options['general']['enable_sort']) {
                    $table_body .= " class=\"text-".$right."\" data-sort-value=\"" . $item['mtime'] . "\"";
                    $table_body .= " title=\"" . $item['iso_mtime'] . "\"";
                }
                $table_body .= ">" . time_ago($item['mtime']) . "</td>" . PHP_EOL;
            }

            $table_body .= "          </tr>" . PHP_EOL;

            if ($table_options['count']) {
                $row_counter += 1;
            }

        endforeach;
    endif;

    if($file_list):
        foreach($file_list as $item) :

            $row_classes  = array();
            $file_classes = array();
            $file_meta = array();

            $item_pretty_size = $item['size']['num'] . " " . $item['size']['str'];

            // Style table rows
            if ($options['bootstrap']['tablerow_files'] != "") {
                $row_classes[] = $options['bootstrap']['tablerow_files'];
            }

            // Is file hidden?
            if (in_array($item['bname'], $options['hidden_files'])) {
                $row_classes[] = "hidden";
                // muted class on row…
                $row_classes[] = $options['bootstrap']['hidden_files_row'];
                // …and again for the link
                $file_classes[] = $options['bootstrap']['hidden_files_link'];
            }

            // Is virtual file?
            if ( ($options['general']['virtual_files'] == true) && (in_array($item['lext'], $virtual_files)) ){

                if ( is_int($options['general']['virtual_maxsize']) == true) {
                    $virtual_maxsize = $options['general']['virtual_maxsize'];
                } else {
                    $virtual_maxsize = 256;
                }
                if  (filesize($navigation_dir.$item['bname']) <= $virtual_maxsize) {

                    $virtual_file =  json_decode(file_get_contents($navigation_dir.$item['bname'], true), true);

                    if ($item['lext'] == 'flickr') {
                        $virtual_attr =  ' data-flickr="'.htmlentities($virtual_file['user']).'/'.htmlentities($virtual_file['id']).'"';
                        if ( $virtual_file['album'] != null) {
                            $album = '/in/album-'.htmlentities($virtual_file['album']);
                        } else {
                            $album = null;
                        }
                        $virtual_attr .= ' data-url="https://www.flickr.com/'.htmlentities($virtual_file['user']).'/'.htmlentities($virtual_file['id']).$album.'"';  
                        $virtual_attr .= ' data-name="'.htmlentities($virtual_file['name']).'"';  
                    } else if ($item['lext'] == 'soundcloud') {
                        $virtual_attr =  ' data-soundcloud="'.htmlentities($virtual_file['type']).'/'.htmlentities($virtual_file['id']).'"';
                        $virtual_attr .= ' data-url="'.htmlentities($virtual_file['url']).'"';  
                        $virtual_attr .= ' data-name="'.htmlentities($virtual_file['name']).'"';  
                    } else if ($item['lext'] == 'vimeo') {
                        $virtual_attr =  ' data-vimeo="'.htmlentities($virtual_file['id']).'"';
                        $virtual_attr .= ' data-url="https://vimeo.com/'.htmlentities($virtual_file['id']).'"';  
                        $virtual_attr .= ' data-name="'.htmlentities($virtual_file['name']).'"';  
                    } else if ($item['lext'] == 'youtube') {
                        $virtual_attr =  ' data-youtube="'.htmlentities($virtual_file['id']).'"';
                        $virtual_attr .= ' data-url="https://youtube.com/watch?v='.htmlentities($virtual_file['id']).'"';  
                        $virtual_attr .= ' data-name="'.htmlentities($virtual_file['name']).'"';  
                    }
                } else {
                    $virtual_attr = null;
                }

                // Don't show file-size in .virtual-file
                $modified_attr = null;
            } else {
                $virtual_attr = null;
                $modified_attr = " data-modified=\"".$item_pretty_size."\"";
            }

            // Concatenate tr-classes
            if (!empty($row_classes)) {
                $row_attr = ' class="'.implode(" ", $row_classes).'"';
            } else {
                $row_attr = null;
            }

            $table_body .= "          <tr$row_attr>" . PHP_EOL;
            
            if ($table_options['count']) {
                $table_body .= "            <td class=\"text-muted text-".$right."\" data-sort-value=\"$row_counter\">$row_counter</td>";
            }
            
            $table_body .= "            <td";
            if ($options['general']['enable_sort']) {
                $table_body .= " class=\"text-".$left."\" data-sort-value=\"". htmlentities(utf8_encode($item['lbname']), ENT_QUOTES, 'utf-8') . "\"" ;
            }
            $table_body .= ">";
            if ($options['bootstrap']['icons'] !== null ) {
                $table_body .= "<".$icons['tag']." class=\"" . $item['class'] . "\"></".$icons['tag'].">&nbsp;";
            }
            if ($options['general']['hide_extension']) {
                $display_name = $item['name'];
            } else {
                $display_name = $item['bname'];
            }

            // inject modal class if necessary
            if ($options['general']['enable_viewer']) {
                if (in_array($item['lext'], $audio_files)) {
                    $file_classes[] = 'audio-modal';
                } else if ($item['lext'] == 'swf') {
                    $file_classes[] = 'flash-modal';
                } else if (in_array($item['lext'], $image_files)) {
                    $file_classes[] = 'image-modal';
                } else if (in_array($item['lext'], $pdf_files)) {
                    $file_classes[] = 'pdf-modal';
                } else if (in_array($item['lext'], $quicktime_files)) {
                     $file_classes[] = 'quicktime-modal';
                } else if (in_array($item['lext'], $source_files)) {
                    if ($options['general']['auto_highlight']) {
                        $file_meta[] = 'data-highlight="true"';
                    }
                    if ($options['viewer']['alt_load'] == true) {
                        $file_classes[] = 'source-modal-alt';
                    } else {
                        $file_classes[] = 'source-modal';
                    }
                } else if (in_array($item['lext'], $text_files)) {
                    if ($options['viewer']['alt_load'] == true) {
                        $file_classes[] = 'text-modal-alt';
                    } else {
                        $file_classes[] = 'text-modal';
                    }
                } else if (in_array($item['lext'], $video_files)) {
                    $file_classes[] = 'video-modal';
                } else if (in_array($item['lext'], $website_files)) {
                    $file_classes[] = 'website-modal';
                } else if (in_array($item['lext'], $virtual_files)) {
                    $file_classes[] = 'virtual-modal';
                }
            }

            $file_data = ' '.implode(" ", $file_meta);

            if ($file_classes != null) {
                $file_attr = ' class="'.implode(" ", $file_classes).'"';
            } else {
                $file_attr = null;
            }

            $table_body .= "<a href=\"" . htmlentities(rawurlencode($item['bname']), ENT_QUOTES, 'utf-8') . "\"$file_attr$file_data$virtual_attr$modified_attr>" . utf8ify($display_name) . "</a></td>" . PHP_EOL;

            // Size
            if ($table_options['size']) {
                $table_body .= "            <td";
                if ($options['general']['enable_sort']) {
                    $table_body .= " class=\"text-".$right."\" data-sort-value=\"" . $item['bytes'] . "\"";
                    $table_body .= " title=\"" . $item['bytes'] . " " .'bytes'."\"";
                }
                    $table_body .= ">" . $item_pretty_size . "</td>" . PHP_EOL;
            }

            // Modified
            if ($table_options['age']) {
                $table_body .= "            <td";
                if ($options['general']['enable_sort']) {
                    $table_body .= " class=\"text-".$right."\" data-sort-value=\"".$item['mtime']."\"";
                    $table_body .= " title=\"" . $item['iso_mtime'] . "\"";
                }
                $table_body .= ">" . time_ago($item['mtime']) . "</td>" . PHP_EOL;
            }

            $table_body .= "          </tr>" . PHP_EOL;

            if ($table_options['count']) {
                $row_counter += 1;
            }
        endforeach;
    endif;
} else {
        $colspan = $table_count + 1;
        $table_body .= "          <tr>" . PHP_EOL;
        $table_body .= "            <td colspan=\"$colspan\" style=\"font-style:italic\">";
        if ($options['bootstrap']['icons']  !== null ) {
            $table_body .= "<".$icons['tag']." class=\"" . $item['class'] . "\">&nbsp;</".$icons['tag'].">";
        } 
        $table_body .= "empty folder"."</td>" . PHP_EOL;
        $table_body .= "          </tr>" . PHP_EOL;
}

// Give kudos
if ($options['general']['give_kudos']) {
    $kudos = "<a class=\"pull-".$right." small text-muted\" href=\"https://github.com/idleberg/Bootstrap-Listr\" title=\"Bootstrap Listr on GitHub\" target=\"_blank\">".'Fork me on GitHub'."</a>" . PHP_EOL;
}



?>