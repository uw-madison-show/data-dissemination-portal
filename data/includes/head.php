
<meta charset='utf-8'>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta http-equiv="Content-Language" content="en">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="Area for data dissemination from the Survey of the Health of Wisconsin (SHOW).">
<meta name="author" content="Survey of the Health of Wisconsin">


<title>SHOW Data</title>

<!-- Icons -->
<link rel="apple-touch-icon-precomposed" href="/data/images/favicon-144.png">
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="/data/images/favicon-144.png">
<link rel="apple-touch-icon-precomposed" sizes="64x64" href="/data/images/favicon-64.png">
<link rel="icon" sizes="48x48" href="/data/images/favicon-48.png">
<link rel="icon" sizes="32X32" href="/data/images/favicon-32.png">
<link rel="icon" sizes="24x24" href="/data/images/favicon-24.png">
<link rel="icon" sizes="16x16" href="/data/images/favicon-16.png">
<meta name="msapplication-TileImage" content="/data/images/favicon-144.png">
<meta name="msapplication-TileColor" content="#ffffff">

<!-- jQuery -->
<script src="//code.jquery.com/jquery-2.1.4.min.js"></script>

<!-- Bootstrap -->
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"/>

<!-- Custom CSS -->
<link rel="stylesheet" type="text/css" href="/data/css/data_styles.css"/>

<!-- CDN fallbacks to local copies -->
<script>
  if (!window.jQuery) {
    document.write('<script src="/js/jquery-2.1.4.min.js"><\/script>')
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
      $('<link rel="stylesheet" type="text/css" href="/css/bootstrap.min.js" />').appendTo('head');
    }
  }
  
  if (!window.jQuery.fn.modal) {
    document.write('<script src="/js/bootstrap.min.js"><\/script>');
  }
</script>

<!-- Google Analytics -->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-72123925-1', 'auto');
  ga('send', 'pageview');

</script>