<!doctype html>
<html lang="en">
  <head>
    <title>XAPP - Xing Client by Sourcloud</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Xing Client - Platform module - by Sourcloud">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Add to homescreen for Chrome on Android -->
    <meta name="mobile-web-app-capable" content="yes">
    <link rel="icon" sizes="192x192" href="images/touch/chrome-touch-icon-192x192.png">

    <!-- Add to homescreen for Safari on iOS -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="XAPP - Xing Client by Sourcloud">
    <link rel="apple-touch-icon-precomposed" href="apple-touch-icon-precomposed.png">

    <!-- Tile icon for Win8 (144x144 + tile color) -->
    <meta name="msapplication-TileImage" content="images/touch/ms-touch-icon-144x144-precomposed.png">
    <meta name="msapplication-TileColor" content="#3372DF">

    <link href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/material.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <style>
    #view-source {
      position: fixed;
      display: block;
      right: 0;
      bottom: 0;
      margin-right: 40px;
      margin-bottom: 40px;
      z-index: 900;
    }
    </style>
    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script>


    $(function() {
      $( "#contacts" ).click(function() {
        //alert( "Handler for .click() called." );
        getContacts();
      });
    });



    function getContacts(){

      $("#results").empty();
      $.getJSON( "contacts", function( data ) {
        var items = [];
        $.each( data, function( key, val ) {
          items.push( "<li><img src='" +val.photoURL +"' />" + val.displayName + " | " + val.profileURL + " | "+ val.email + "</li>" );
          console.log(val);
        });

        $( "<ul/>", {
          "class": "my-new-list",
          html: items.join( "" )
        }).appendTo( "#results" );

      });

    }
    </script>
  </head>

  <body>

    <div class="demo-blog mdl-layout mdl-js-layout has-drawer is-upgraded">
      <main class="mdl-layout__content">
        <div class="demo-blog__posts mdl-grid">
          <div class="mdl-card something-else mdl-cell mdl-cell--8-col mdl-cell--4-col-desktop">
            <div class="mdl-card__media mdl-color--white mdl-color-text--grey-600">
              <img src="<?= $photoURL ?>">
            </div>
            <div class="mdl-card__supporting-text meta meta--fill mdl-color-text--grey-600">
              <div>
                <strong><?= $displayName ?></strong>
              </div>
            </div>
          </div>

          <div class="mdl-card on-the-road-again mdl-cell mdl-cell--12-col">
              <div class="mdl-color-text--grey-600 mdl-card__supporting-text">
            <? if ($isLoggedIn) { ?>
              <a href="logout"><button class="mdl-button mdl-js-button mdl-button--raised">LOGOUT</button></a>
              <a id="contacts"><button id="contacts" class="mdl-button mdl-js-button mdl-button--raised">Contacts</button></a>
              <button class="mdl-button mdl-js-button mdl-button--raised">Search</button>
            <? } else { ?>
              <a href="login"><button class="mdl-button mdl-js-button mdl-button--raised">LOGIN via XING</button></a>
            <? } ?>
          </div>
          </div>

          <div class="mdl-card amazing mdl-cell mdl-cell--12-col">
            <div class="mdl-card__title mdl-color-text--grey-50">
              <div id="results">
              <h3 class="quote">Many people go differnt ways to see the same thing.</a></h3>
              </div>
            </div>
          </div>

          <div class="mdl-card on-the-road-again mdl-cell mdl-cell--12-col">
              <div class="mdl-color-text--grey-600 mdl-card__supporting-text">
                <button class="mdl-mini-footer--social-btn social-btn social-btn__twitter">
                  <span class="visuallyhidden">Twitter</span>
                </button>
                <button class="mdl-mini-footer--social-btn social-btn social-btn__blogger">
                  <span class="visuallyhidden">Facebook</span>
                </button>
                <button class="mdl-mini-footer--social-btn social-btn social-btn__gplus">
                  <span class="visuallyhidden">Google Plus</span>
                </button>
              </div>
          </div>


        </div>
      </main>
      <div class="mdl-layout__obfuscator"></div>
    </div>
    <!--
    <script src="../../material.min.js"></script>
-->
      <!--
      <p>Your consumer key is <mark><?= $consumerKey ?></mark> (edit <code>config.php</code> to change)</p>
      -->
    </div>

  </body>

</html>
