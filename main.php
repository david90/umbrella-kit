<? require_once("config.php"); ?>
<!doctype html>
<html>

<head>
  <title>Umbrella Story - All about #umbrellaRevolution</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, minimum-scale=1.0, initial-scale=1.0, user-scalable=yes">
  <meta name="keywords" content="hong kong, hk, democracy, oclp, umbrella revolution, umbrellarevolution" />
  <meta property="og:type" content="website">
  <meta name="author" content="Umbrella Story" />
  <? $protocol = stripos($_SERVER['SERVER_PROTOCOL'],'https') === true ? 'https://' : 'http://'; ?>
  <meta property="og:title" content="Umbrella Story - All about #umbrellaRevolution" />
  <meta property="og:image" content="<? echo $protocol . $_SERVER['HTTP_HOST']; ?>/img/og-thumb.png?12434r13" />
  <meta property="og:url" content="<? echo $protocol . $_SERVER['HTTP_HOST']; ?>" />
  <meta property="og:image:url" content="<? echo $protocol . $_SERVER['HTTP_HOST']; ?>/img/og-thumb.png?1323234" />
  <meta property="og:image:type" content="image/png" />
  <meta property="og:image:width" content="300" />
  <meta property="og:image:height" content="300" />
  <meta property="og:site_name" content="Umbrella Story"/>
  <meta property="og:description" content="What's happening in Hong Kong? Do you know what is #umbrellaRevolution?" />
  <script src="/components/platform/platform.js"></script>
  <link rel="shortcut icon" id="favicon" href="favicon.ico">
  <link rel="import" href="/components/font-roboto/roboto.html">
  <link rel="import" href="/components/core-header-panel/core-header-panel.html">
  <link rel="import" href="/components/core-toolbar/core-toolbar.html">
  <link rel="import" href="/components/core-icon-button/core-icon-button.html">
  <link rel="import" href="/components/paper-tabs/paper-tabs.html">
  <link rel="import" href="/components/paper-input/paper-input.html">
  <link rel="import" href="/components/paper-button/paper-button.html">
  <link rel="import" href="/kit-list.html">
  <link rel="import" href="/page-about.html">
  <link rel="import" href="/page-credits.html">
  <link rel="import" href="/page-embed-imgur.html">
  <!-- <link rel="import" href="/page-instagram.html"> -->
  <link rel="stylesheet" type="text/css" href="/stylesheets/main.css">
  <!--plugin-->
  <link type="text/css" rel="stylesheet" href="stylesheets/lightGallery.css" />
  <link rel="stylesheet" href="outdatedbrowser/outdatedBrowser.min.css">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-instagram/0.3.1/instagram.min.js"></script>
  <script src="js/lightGallery.min.js"></script>
  <script src="outdatedbrowser/outdatedBrowser.min.js"></script>
</head>

<body unresolved>
  <div id="outdated">
       <h6>Your browser is out-of-date!</h6>
       <p>Update your browser to view this website correctly. <a id="btnUpdateBrowser" href="http://outdatedbrowser.com/">Update my browser now </a></p>
       <p class="last"><a href="#" id="btnCloseUpdateBrowser" title="Close">&times;</a></p>
  </div>
  <core-header-panel>
    <core-toolbar>
      <a href="#home" class="logo"></a>
      
      <?
        // Select default page 
        $url = $_SERVER['REQUEST_URI']; 
        $tokens = explode('/', $url);
        $tab = $tokens[sizeof($tokens)-1];

        if ($tab == "") {
          $tab = "home";
        }
      ?>

      <paper-tabs selected="<?echo $tab;?>" valueattr="name" self-end>
        <paper-tab name="home">Home</paper-tab>
        <paper-tab name="about">About</paper-tab>
        <paper-tab name="all">Kits</paper-tab>
        <paper-tab name="instagram">#UR</paper-tab>
        <paper-tab name="credits">Credits</paper-tab>
      </paper-tabs>
    </core-toolbar>
    <div class="container" layout vertical center>
      <kit-list show="all"></kit-list>
      <page-about hide="true"></page-about>
      <page-credits hide="true"></page-credits>
      <page-embed-imgur hide="true"></page-embed-imgur>
      <page-instagram hidden="true">
      <h1>Latest <code>#umbrellaRevolution</code> on Instagram</h1>
      <div class="instagram instagram-umbrellaRevolution"></div>
        <script>

            function createPhotoElement(photo) {
              var innerHtml = $('<img>')
                .addClass('instagram-image')
                .attr('src', photo.images.thumbnail.url);

              innerHtml = $('<a>')
                .attr('target', '_blank')
                .attr('href', photo.link)
                .append(innerHtml);

              return $('<div>')
                .addClass('instagram-placeholder')
                .attr('id', photo.id)
                .append(innerHtml);
            }

            function didLoadInstagram(event, response) {
              var that = this;

              $.each(response.data, function(i, photo) {
                $(that).append(createPhotoElement(photo));
              });
            }

            jQuery(function($) {
              $('.instagram-umbrellaRevolution').on('willLoadInstagram', function(event, options) {
                // console.log(options);
              });

              $('.instagram-umbrellaRevolution').on('didLoadInstagram', didLoadInstagram);
              $('.instagram-umbrellaRevolution').instagram({
                hash: 'umbrellaRevolution',
                count: 30,
                clientId: '628a50bdb71540ab9cda3aff8fffca13'
              });
            });
            </script>


      </page-instagram>
      <paper-button raised id="dynamic" class="info-btn" label="Info Kit"></paper-button>

  <!--Disqus-->
    <div id="disqus_thread"></div>
    <script type="text/javascript">
        var disqus_shortname = 'umbrellastory';

        /* * * DON'T EDIT BELOW THIS LINE * * */
        (function() {
            var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
            dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
            (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
        })();
    </script>
    <noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
    <a href="http://disqus.com" class="dsq-brlink">comments powered by <span class="logo-disqus">Disqus</span></a>
 
    </div>
  </core-header-panel>

  <script>

    // Ugly. Refractor later.
    var list = document.querySelector('kit-list');
    var tabs = document.querySelector('paper-tabs');

    var page_about = document.querySelector('page-about');
    var page_credits = document.querySelector('page-credits');
    var page_embed_imgur = document.querySelector('page-embed-imgur');
    var page_instagram = document.querySelector('page-instagram');

    tabs.addEventListener('core-select', function() {
      history.pushState(null,null,tabs.selected);
      if (tabs.selected == "all" || tabs.selected == "pdf") {
        list.show = tabs.selected;
        page_credits.hide = "true";
        page_embed_imgur.hide = "true";
        page_instagram.hidden = "true";
        page_about.hide = "true";
      }
      else if (tabs.selected == "about") {
        page_about.hide = "false";
        page_credits.hide = "true";
        page_embed_imgur.hide = "true";
        page_instagram.hidden = "true";
        list.show = "none";
      }
      else if (tabs.selected == "credits") {
        page_about.hide = "true";
        page_credits.hide = "false";
        page_embed_imgur.hide = "true";
        page_instagram.hidden = "true";
        list.show = "none";
      } else if (tabs.selected == "home") {
        page_about.hide = "true";
        page_credits.hide = "true";
        page_embed_imgur.hide = "false";
        page_instagram.hidden = "true";
        list.show = "none";
      } else if (tabs.selected == "instagram") {
        page_about.hide = "true";
        page_credits.hide = "true";
        page_embed_imgur.hide = "true";
        $(page_instagram).removeAttr("hidden");
        list.show = "none";
      }

    });
  </script>
  <!--Addthis-->
  <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-54322cf96007d832" async></script>
  <!--lightGallery-->
  <script type="text/javascript">
  $(document).ready(function() {
    // if have hash
    var hash = window.location.hash;
    if (hash) {
      var hashName = hash.replace("#", "");
      var tabs = document.querySelector('paper-tabs');
      tabs.select = hashName;
    }

    var imageList = <?echo $IMAGE_ZH_JSON;?>;


    $('#dynamic').click(function(e){
        $(this).lightGallery({
            dynamic:true,
            html:true,
            mobileSrc:true,
            dynamicEl: imageList
        }); 
    }) 
  });
</script>

  <!--Analytics-->
  <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-55421485-1', 'auto');
    ga('send', 'pageview');

  </script>
  <!-- Outdated browser -->
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
</body>

</html>
