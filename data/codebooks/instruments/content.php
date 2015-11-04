<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Survey of the Health of Wisconsin</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="title" content=""/>
<meta http-equiv="keywords" content=""/>
<meta http-equiv="description" content=""/>
<script language="javascript" type="text/javascript" src="javascript/utility.js"></script>
<script language="javascript" type="text/javascript" src="javascript/jquery-1.3.1.min.js"></script>
<script language="javascript" type="text/javascript" src="javascript/hoverIntent.js"></script>
<link rel="stylesheet" href="style/stylesheet.css" type="text/css" media="screen"/>
<link rel="stylesheet" href="style/print.css" type="text/css" media="print"/>
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
<link rel="icon" href="favicon.ico" type="image/x-icon" />
<!--[if IE 6]>
	<style type="text/css">
	/* IE6 specific styles to support PNG-24 Alpha Transparency */
	#navBarShadow {background-image: none; filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='images/bg_navbar_shadow.png'); }
	#masterContainer {background-image: none; filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='images/bg_shadow.png', sizingMethod='scale'); }
    .footerColumn .uwLogo{background-image: none; filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='images/footer_uw.png'); }
    #header{position: relative;background-image: none; filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='images/sample_header.png'), sizingMethod='scale'); border: 1px solid #000000; }
    .footerColumn .uwhealthLogo{background-image: none; filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='images/footer_uwhealth.png'); }
	.topLinks .uwhcLink{background-image: none; filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='images/topLink_uwhealth.png');	 }
    .topLinks .smphLink{background-image: none; filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='images/topLink_smph.png'); }
    #navBar .navItem .navDrop {background-image: none;filter:progid:DXImageTransform.Microsoft.Shadow(color='#666666', Direction=135, Strength=3); }
	</style>
<![endif]-->
</head>
<body>
<!-- Print Logo (invisible) -->
<div class="printLogo"><img src="images/your_print_logo.gif" height="" width="" title="" alt="" /></div>
<!-- End Print Logo -->
<!-- Skip to Content Link (invisible) -->
<div class="skipToContent"><a href="#contentContainer">Skip to Content</a></div>
<!-- End Skip to Content Link -->
<!-- Header -->
<div id="header">
  <!-- Top Links with Icons -->
  <!--div class="topLinks"><a href="http://www.pophealth.wisc.edu/" class="smphLink" title="www.pophealth.wisc.edu" target="_blank">pophealth.wisc.edu</a><a href="http://med.wisc.edu/" class="smphLink" title="med.wisc.edu" target="_blank">med.wisc.edu</a></div-->
  <!-- End Top Links with Icons -->
  <!-- Top Navigation List -->
  <ul>
    <li><a href="http://www.show.wisc.edu">Main SHOW site</a></li>
    <li><a href="http://www.pophealth.wisc.edu">Population Health Sciences</a></li>
    <li class="last"><a href="http://med.wisc.edu">School of Medicine and Public Health</a></li>
  </ul>
  <!-- End Navigation List -->
</div>
<!-- End Header -->
<!-- Master Container - main navigation + page content + left nav + footer -->
<div id="masterContainer">
  <div class="margin10">
    <div id="navBar">
      <!-- Main Navigation List	(red bar) -->
      <ul id="navMain">
        <li class="navItem"><a href="content.php?page=main">Home</a></li>
        <li class="navItem"><a href="#">Data</a>
		   	<div class="navDrop">
				<div><a href="content.php?page=codebook">Codebooks</a></div>
				<div><a href="content.php?page=avail">Variables</a></div>
				<!--div><a href="content.php?page=na">Biological samples</a></div-->
			</div>
		</li>
        <li class="navItem"><a href="#">Subjects</a>
			<div class="navDrop">
				<div><a href="content.php?page=demo">Demographics</a></div>
				<div><a href="content.php?page=health">Health</a></div>
				<div><a href="http://www.showcodebook.org/Counties_Visited_08-11.pdf" target="_blank">Counties</a></div>
			</div>
		</li>
      </ul>
      <!-- End Main Navigation List -->
      <!-- Search Box & Button -->
      <div class="searchBox">
        <!--form action="" onsubmit="return search(this.q.value);">
          <label for="q">&nbsp;</label>
          <input name="q" type="text" value="Search" class="searchText" id="q" />
          <input type="image" src="images/btn_search.gif" name="sa" alt="Search Button" class="searchButton" />
        </form-->
      </div>
      <!-- End Search Box & Button -->
    </div>
    <div id="navBarShadow"></div>

		<!-- INSERT MAIN CONTENT HERE -->
		<?php
			$page=$_GET["page"].".php";
			include $page;
		?>

    <!-- End Main Page Content Cotnainer -->
  </div>
  <!-- End Margin Div -->
  <!-- Footer -->
  <div id="footer">
    <!--div class="footerColumn">
      <ul>
        <li class="header"><a href="#">Education</a></li>
        <li><a href="#">Link Example</a></li>
        <li><a href="#">Link Example</a></li>
      </ul>
      <ul>
        <li class="header"><a href="#">Research</a></li>
        <li><a href="#">Link Example</a></li>
        <li><a href="#">Link Example</a></li>
        <li><a href="#">Link Example</a></li>
        <li><a href="#">Link Example</a></li>
        <li><a href="#">Link Example</a></li>
        <li><a href="#">Link Example</a></li>
        <li><a href="#">Link Example</a></li>
        <li><a href="#">Link Example</a></li>
        <li><a href="#">Link Example</a></li>
        <li><a href="#">Link Example</a></li>
      </ul>
    </div>
    <div class="footerColumn footerColumn200"><a href="http://www.wisc.edu" target="_blank" class="linkImage uwLogo" title="University of Wisconsin - Madison">UW Madison</a><a href="http://www.uwhealth.org/" target="_blank" class="linkImage uwhealthLogo" title="UW Health">UW Health</a><br class="clearFloat"/>
      <ul>
        <li class="header"><a href="#">Departments, Institutes and Centers</a></li>
        <li class="header"><a href="#">Faculty Directory</a></li>
        <li class="header"><a href="#">Contact Us</a></li>
        <li class="header"><a href="#">For Faculty and Staff</a></li>
      </ul>
      <ul>
        <li class="header"><a href="#">Our Campus</a></li>
        <li><a href="#">Link Example</a></li>
        <li><a href="#">Link Example</a></li>
      </ul>
    </div>
    <br class="clearFloat" /-->
    <div class="footerCopyright"> <span class="lastUpdated">
	<?php
		if (file_exists($page)) {
			echo "Last updated: " . date ("m/d/Y", filemtime($page));
		}
	?><br />
      <a href="mailto:info@show.wisc.edu">info@show.wisc.edu</a></span>Copyright &copy; 2013 The Board of Regents of the University of Wisconsin System</div>
  </div>
  <!-- End Footer -->
</div>
<!-- End Master Container -->
<!-- Script for Initializing Search Box -->
<script language="javascript" type="text/javascript">initSearch();</script>
<!-- End Script for Initializing Search Box -->
</body>
</html>
