<!DOCTYPE html>
<html>

  <head>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XAPP for Fonpit AG</title>
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
    <div class="container">
      <div class="starter-template">
      <h1>Hello <?= $displayName ?></h1>
      <img src="<?= $photoURL ?>" class="img-rounded">
      <!--
      <p>Your consumer key is <mark><?= $consumerKey ?></mark> (edit <code>config.php</code> to change)</p>
      -->
      <p>This application is part of the <b>platform</b> project by Erik Woitschig.<br/>
      http://bnz-power.com</p>

      <? if ($isLoggedIn) { ?>
        <a href="logout" class="btn btn-danger">Logout</a>
        <a id="contacts" class="btn btn-danger">Contacts</a>
        <a href="find/appmedia" class="btn btn-danger">Search (ie appmedia)</a>
      <? } else { ?>
        <a href="login" class="btn btn-primary">Login</a>
      <? } ?>
    <div id="results"></div>
      </div>
    </div>
  </body>

</html>
