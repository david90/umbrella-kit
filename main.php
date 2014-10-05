<!doctype html>
<html>

<head>
  <title>Umbrella Story - All about #umbrellaRevolution</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, minimum-scale=1.0, initial-scale=1.0, user-scalable=yes">
  <script src="/components/platform/platform.js"></script>
  <link rel="import" href="/components/font-roboto/roboto.html">
  <link rel="import" href="/components/core-header-panel/core-header-panel.html">
  <link rel="import" href="/components/core-toolbar/core-toolbar.html">
  <link rel="import" href="/components/core-icon-button/core-icon-button.html">
  <link rel="import" href="/components/paper-tabs/paper-tabs.html">
  <link rel="import" href="/components/paper-input/paper-input.html">
  <link rel="import" href="post-list.html">
  <link rel="import" href="page-about.html">
    <link rel="stylesheet" type="text/css" href="/stylesheets/main.css">
</head>

<body unresolved>
  <core-header-panel>
    <core-toolbar>
      <a href="/" class="logo"><img src="/images/logos/lockup.svg"></a>
      <paper-tabs selected="all" valueattr="name" self-end>
        <paper-tab name="all">ALL</paper-tab>
        <paper-tab name="favorites">FAVORITES</paper-tab>
        <paper-tab name="about">About</paper-tab>
        <paper-tab name="credits">Credits</paper-tab>
      </paper-tabs>
    </core-toolbar>
    <div class="container" layout vertical center>
      <!-- <paper-input label="Search"></paper-input> -->
      <post-list show="all"></post-list>
    </div>
  </core-header-panel>

  <script>
    var list = document.querySelector('post-list');
    var tabs = document.querySelector('paper-tabs');

    var page_about = document.querySelector('page-about');

    tabs.addEventListener('core-select', function() {
      list.show = tabs.selected;
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
</body>

</html>
