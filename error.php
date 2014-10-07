<? $protocol = stripos($_SERVER['SERVER_PROTOCOL'],'https') === true ? 'https://' : 'http://'; ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Umbrella Story - All about #umbrellaRevolution</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, initial-scale=1.0, user-scalable=yes">
    <meta name="keywords" content="hong kong, hk, democracy, oclp, umbrella revolution, umbrellarevolution" />
    <meta property="og:type" content="website">
    <meta name="author" content="Umbrella Story" />
    <meta property="og:title" content="Umbrella Story - All about #umbrellaRevolution" />
    <meta property="og:image" content="<? echo $protocol . $_SERVER['HTTP_HOST']; ?>/img/og-thumb.png?12434r13" />
    <meta property="og:url" content="<? echo $protocol . $_SERVER['HTTP_HOST']; ?>" />
    <meta property="og:image:url" content="<? echo $protocol . $_SERVER['HTTP_HOST']; ?>/img/og-thumb.png?1323234" />
    <meta property="og:image:type" content="image/png" />
    <meta property="og:image:width" content="300" />
    <meta property="og:image:height" content="300" />
    <meta property="og:site_name" content="Umbrella Story"/>
    <meta property="og:description" content="Why sharing this page? Please go to <? echo $protocol . $_SERVER['HTTP_HOST']; ?> instead." />
    <link rel="shortcut icon" id="favicon" href="favicon.ico">
    <link rel="stylesheet" type="text/css" href="stylesheets/error.css" />

    <link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="outdatedbrowser/outdatedBrowser.min.css">    
    <link rel="stylesheet" type="text/css" href="css/elusive-webfont.css" />
  </head>
  <body class="error" id="body">
    <div id="outdated">
         <h6>Your browser is out-of-date!</h6>
         <p>Update your browser to view this website correctly. <a id="btnUpdateBrowser" href="http://outdatedbrowser.com/">Update my browser now </a></p>
         <p class="last"><a href="#" id="btnCloseUpdateBrowser" title="Close">&times;</a></p>
    </div>

      <?
        @$error_code = $_GET['errorcode'];
        if(@$error_code != null) {
          $display_error_code = "".$error_code;
        } else {
          $display_error_code = "";
        }
      ?>


      <h1 class="customicon-child"> HEY.<?echo $display_error_code;?> ERROR!</h1>
      <a href="/">GO HOME</a>
      <footer> Umbrella Story</footer>
  </body>
  <script src="outdatedbrowser/outdatedBrowser.min.js"></script>
  <script>
      function addLoadEvent(func) {
        var oldonload = window.onload;
        if (typeof window.onload != 'function') {
            window.onload = func;
        } else {
            window.onload = function() {
                oldonload();
                func();
            }
        }
    }
    //call plugin function after DOM ready
    addLoadEvent(
        outdatedBrowser({
            bgColor: '#f25648',
            color: '#ffffff',
            lowerThan: 'transform'
        })
    );
  </script>

  <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-55421485-1', 'auto');
    ga('send', 'pageview');

  </script>
</html>
