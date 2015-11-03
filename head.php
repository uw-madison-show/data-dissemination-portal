
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

