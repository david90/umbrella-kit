<?
  @$get_lang = $_GET["lang"];
  @$get_fb_locale = $_GET["fb_locale"];
 require_once("config.php"); 

  // page parameters
  $protocol = stripos($_SERVER['SERVER_PROTOCOL'],'https') === true ? 'https://' : 'http://';
  $url = $_SERVER['REQUEST_URI']; 
  $tokens = explode('/', $url);
  $tab =  strtolower($tokens[sizeof($tokens)-1]);
  $url_parts = parse_url($tab);

  if (isset($url_parts['path']))
    $tab = $url_parts['path'];
  
  if (!isset($tab) || $tab == "") {
    $tab = "home";
  } else if ($tab == "view") {
    // Handle Show album
    $show_album = true;
    $tab = "all";
  }

  // Handle Preferred language
  $preferred_lang =  strtolower($tokens[sizeof($tokens)-2]);
  // The language localization helper
  require_once ("lang.php");
?>

<!doctype html>
<html>
<head>
  <title>Umbrella Story - All about #umbrellaRevolution</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, minimum-scale=1.0, initial-scale=1.0, user-scalable=yes">
  <meta name="keywords" content="hong kong, hk, democracy, oclp, umbrella revolution, umbrellarevolution" />
  <meta name="author" content="Umbrella Story" />

  <meta property="og:url" content="<? echo $protocol . $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; ?>" />
  
  <?php 
    // TODO, handle this in locale too
    if (isset($_GET["locale"])) {
      $s_metafile = 'meta/' .$_GET['locale'] . '_meta.php';
      if (file_exists($s_metafile))
        include($s_metafile);
      else
        include('meta/en_US_meta.php');
    } else {
      include(META_TAGS_LOCALE($preferred_lang));
    }
  ?>

  <meta property="og:type" content="website" />
  <script src="/components/platform/platform.js"></script>
  <link rel="shortcut icon" id="favicon" href="/favicon.ico">
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
  <link rel="stylesheet" type="text/css" href="/stylesheets/main.css">
  <link rel="stylesheet" href="/assets/stylesheets/arthref.css">
  <!--plugin-->
  <link type="text/css" rel="stylesheet" href="/stylesheets/lightGallery.css" />
  <link rel="stylesheet" href="/outdatedbrowser/outdatedBrowser.min.css">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-instagram/0.3.1/instagram.min.js"></script>
  <script src="/js/lightGallery.min.js"></script>
  <script src="/assets/javascripts/socialShare.js"></script>
  <script src="/outdatedbrowser/outdatedBrowser.min.js"></script>
</head>

<body unresolved>
  <div id="outdated">
       <h6>Your browser is out-of-date!</h6>
       <p>Update your browser to view this website correctly. <a id="btnUpdateBrowser" href="http://outdatedbrowser.com/">Update my browser now </a></p>
       <p class="last"><a href="#" id="btnCloseUpdateBrowser" title="Close">&times;</a></p>
  </div>
  <core-header-panel>
    <core-toolbar>
      <a href="#" class="logo"></a>
      <paper-tabs selected="<?echo $tab;?>" valueattr="name" self-end>
        <paper-tab name="home">Home</paper-tab>
        <paper-tab name="about">About</paper-tab>
        <paper-tab name="all">Kits</paper-tab>
        <paper-tab name="instagram">#UR</paper-tab>
        <paper-tab name="credits">Credits</paper-tab>
      </paper-tabs>
    </core-toolbar>
    <div class="container" layout vertical center>
      <div class="lang-switch">
        <a href='/zh-hk/'>繁中</a>
        <a href='/en/'>English</a>
        <a href='/fr/'>Français</a>
        <a href='/da/'>Dansk</a>
        <a href='/jp/'>日本語</a>
        <a href='/kr/'>한국어</a>
      </div>
      <kit-list show="all"></kit-list>
      <page-about hide="true"></page-about>
      <page-credits hide="true"></page-credits>
      <page-embed-imgur hide="true" 
        embed_caption_h3="<?=LOCALE("embed_caption_h3");?>"
        embed_caption_text_1="<?=LOCALE("embed_caption_text_1");?>"
        embed_caption_text_2="<?=LOCALE("embed_caption_text_2");?>"
        >
        </page-embed-imgur>
      <page-instagram hidden="true" center>
      <h1 style="margin-top: 80px">Live <code>#umbrellaRevolution</code></h1>
      <div class="instagram instagram-umbrellaRevolution"></div>
      <div layout vertical center class="twitter-widget">
        <a class="twitter-timeline" href="https://twitter.com/hashtag/umbrellaRevolution" data-widget-id="521886203319037955">#umbrellaRevolution Tweets</a>
        <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
        <p>
        <a href="http://umbrellarevolution.happenings.io/" target="_blank"> UmbrellaRevolution @Happenings.io</a>
        </p>
      </div>
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
      <div class="umbrella-at-cwb" ></div>
      <img src="/img/grey_arrow_down.png" class="get-kit-arrow"/>
      <!-- id="dynamic" -->
      <a href="/all"><paper-button raised class="info-btn">Get Kit</paper-button></a>
      <br />
  <!-- Like box-->
  <div class="addthis_native_toolbox"></div>
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
        <? if(!has_about_lang($preferred_lang)){ 
          $preferred_lang = "en";
         } ?>
        page_about.preferred_lang = "<?echo $preferred_lang; ?>";
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
        <? if(!is_permitted_lang($preferred_lang)){ 
          $preferred_lang = "en";
         } ?>
        page_embed_imgur.preferred_lang = "<?echo $preferred_lang; ?>";
        page_instagram.hidden = "true";
        list.show = "none";
      } else if (tabs.selected == "instagram") {
        page_about.hide = "true";
        page_credits.hide = "true";
        page_embed_imgur.hide = "true";
        $(page_instagram).removeAttr("hidden");
        list.show = "none";
      }

      var container =document.querySelector('.container');
      if (container != null) {
        container.scrollIntoView(container);
        container = null;
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
    }); 
</script>
  <div class="share"></div>

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
          
      function socialShare(customURL){
        shareSingleton = $('.share').socialShare({
          shareUrl: customURL,
          animation: 'launchpad', // launchpad, launchpadReverse, slideTop, slideRight, slideBottom, slideLeft, chain
          "social": "blogger,delicious,digg,facebook,friendfeed,google,linkedin,myspace,pinterest,reddit,stumbleupon,tumblr,twitter,windows,yahoo"
        }); 
      }
    </script>

    <!-- TODO separate into standalone JS -->
    <script>
      var imageList = [];
      imageList["zh-hk"] = <?=$IMAGE_ZH_JSON ?>;
      imageList["en"] = <?=$IMAGE_EN_JSON ?>;
      imageList["fr"] = <?=$IMAGE_FR_JSON ?>;
      imageList["de"] = <?=$IMAGE_DE_JSON ?>;
      imageList["da"] = <?=$IMAGE_DA_JSON ?>;
      imageList["th"] = <?=$IMAGE_TH_JSON ?>;
      imageList["es"] = <?=$IMAGE_ES_JSON ?>;
      imageList["jp"] = <?=$IMAGE_JP_JSON ?>;
      imageList["kr"] = <?=$IMAGE_KR_JSON ?>;


      function openAlbumView(lang) {
        var albumJSON = imageList[lang];
        if (imageList[lang] == undefined) {
          albumJSON = imageList["en"];
        }
        $(this).lightGallery({
            dynamic:true,
            html:true,
            mobileSrc:true,
            dynamicEl: albumJSON,
            onOpen : function(plugin) {history.pushState(null,null,"view?lang="+lang);}, 
            onCloseAfter  : function(plugin) {history.pushState(null,null,"all");}
        }); 
      }

      function autoOpenAlbumView() {
        <? if (isset($show_album) && $show_album == true){?>
          openAlbumView("<? echo $get_lang?>");
        <?}?>
      }

      document.addEventListener('view-tap', function(e) {
        openAlbumView(e.detail.lang);
      });

      document.addEventListener('polymer-ready', function(e) {
        autoOpenAlbumView("");
      });

      document.addEventListener('share-tap', function(e) {
        var customURL = "<? echo $protocol . $_SERVER['HTTP_HOST']; ?>/view?lang="+e.detail.lang+"";
        socialShare(customURL);
        $(".share").click();
      });

    </script>
  </template>
</body>

</html>
