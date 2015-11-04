<?php

/**
 * @file
 * rewritten with only the smph template elements
 *
 */

global $user;
$roles_array = array_values($user->roles);
// print_r($roles_array);
if( in_array('editor', $roles_array) ){
  $nid = arg(1);
  $edit_this_page_link = '<a href="' . '/node/' . $nid . '/edit">Edit This Page</a>';
  echo '<div style="position:fixed;margin-top:20px;background:#fff4c8;border:1px solid #ffcc00;width:150px;z-index:100;">'.$edit_this_page_link.'<br /><br /></div>';
}
?>
<div id="page">
  <div id="masthead">
    <div id="header" class="clearfix">
      <?php if ($page['topLinks']) { ?>
        <div id='topLinks'>
          <?php print render($page['topLinks']); ?>
        </div>
      <?php } ?>
      <div id="logo-title">
        <?php if ($logo): ?>
          <a href="<?php print $front_page ?>" title="<?php print t('Home'); ?>"> <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" id="logo" /> </a>
        <?php endif; ?>
      </div><!-- /logo-title -->
      <div id="name-and-slogan">
        <?php if ($site_name): ?>
          <h1 id='site-name'> <a href="<?php print $front_page ?>" title="<?php print t('Home'); ?>"> <?php print $site_name; ?> </a> </h1>
        <?php endif; ?>
        <?php if ($site_slogan): ?>
          <div id='site-slogan'> <?php print $site_slogan; ?> </div>
        <?php endif; ?>
      </div><!-- /name-and-slogan -->
      <?php if ($page['header']): ?>
        <div style="clear:both"></div>
        <?php print render($page['header']); ?>
      <?php endif; ?>
      <?php if ($main_menu): ?>
        <div> 
          <?php print theme('links', array('links' => $main_menu)); ?> 
        </div>
      <?php endif; ?>
    </div><!-- /header -->
  </div><!-- /masthead -->
  <div id="masterContainer">
    <div class="margin10">
      <div id="navBar">
        <div id="suckerfishmenu">
          <?php if ($page['navBar']) { ?>
            <?php print render($page['navBar']) ?>
          <?php } ?>
        </div>
      </div>
      <?php if ($page['pageHeader']) { ?>
        <div id="pageHeader">
          <?php print render($page['pageHeader']) ?>
        </div>
      <?php } ?>
      <?php if ($page['newsTickerWrapper']) { ?>
        <div id="newsTickerWrapper">
          <?php print render($page['newsTickerWrapper']) ?>
        </div>
      <?php } ?>
      <div id="contentContainer">
        <?php if ($page['leftNavContainer']) { ?>
          <div id="leftNavContainer">
            <?php print render($page['leftNavContainer']) ?>
          </div>
        <?php } ?>
        <div id="mainContainer">
          <?php if ($page['mainContainer']) { ?>
            <?php print render($page['mainContainer']) ?>
          <?php } ?>
          <?php print render($page['content']); ?>
        </div>
      </div>
      <?php if ($page['footer']) { ?>
        <div id="footer">
          <?php print render($page['footer']) ?>
          <?php print $feed_icons; ?>
        </div>
      <?php } ?>
    </div><!-- /margin10 -->
  </div><!-- /masterContainer -->
</div><!-- /page -->
