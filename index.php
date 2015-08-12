<?php

//require 'vendor/autoload.php';
//require 'hybridauth-master/hybridauth/index.php';
require_once( "hybridauth-master/hybridauth/Hybrid/Auth.php" );
require_once( "hybridauth-master/hybridauth/Hybrid/Endpoint.php" );
require 'Slim-master/Slim/Slim.php';
\Slim\Slim::registerAutoloader();
require dirname(__FILE__) . '/config.php';

$app        = new \Slim\Slim();
$hybridauth = new Hybrid_Auth($config);

// default route: display the user details and offer log-in/out button
$app->get('/', function () use ($hybridauth, $config, $app) {
  if ($hybridauth->isConnectedWith('XING')) {
    // Get the existing hybridauth session.
    // In theory `authenticate` could start the handshake,
    // but since we already know that hybridauth isConnectedWith XING,
    // this will work fine.
    $xing        = $hybridauth->authenticate('XING');
    $currentUser = $xing->getUserProfile();

    $displayName = $currentUser->displayName;
    $photoURL    = $currentUser->photoURL;
    /*
    $contacts    = $xing->getUserContacts();
    $contacts = json_encode($contacts);
    echo $contacts;
    */
  } else {
    $displayName = 'Anonymous';
    $photoURL    = 'https://www.xing.com/img/n/nobody_m.140x185.jpg';
  }

  $app->render('index-mat.php', array(
    "displayName" => $displayName,
    "photoURL"    => $photoURL,
    "isLoggedIn"  => $hybridauth->isConnectedWith('XING'),
    "consumerKey" => $config["providers"]["XING"]["keys"]["key"]
  ));
});

$app->get('/contacts', function () use ($hybridauth, $config, $app) {
  if ($hybridauth->isConnectedWith('XING')) {
    // Get the existing hybridauth session.
    // In theory `authenticate` could start the handshake,
    // but since we already know that hybridauth isConnectedWith XING,
    // this will work fine.
    $xing        = $hybridauth->authenticate('XING');
/*    $currentUser = $xing->getUserProfile();

    $displayName = $currentUser->displayName;
    $photoURL    = $currentUser->photoURL;
*/
    $contacts    = $xing->getUserContacts();
    $contacts = json_encode($contacts);
    echo $contacts;
  } else {
    $displayName = 'Anonymous';
    $photoURL    = 'https://www.xing.com/img/n/nobody_m.140x185.jpg';
  }

  /*
  $app->render('index-mat.php', array(
    "displayName" => $displayName,
    "photoURL"    => $photoURL,
    "isLoggedIn"  => $hybridauth->isConnectedWith('XING'),
    "consumerKey" => $config["providers"]["XING"]["keys"]["key"]
  ));
  */
});

$app->get('/find/appmedia', function () use ($hybridauth, $config, $app) {
  if ($hybridauth->isConnectedWith('XING')) {
    // Get the existing hybridauth session.
    // In theory `authenticate` could start the handshake,
    // but since we already know that hybridauth isConnectedWith XING,
    // this will work fine.
    $xing        = $hybridauth->authenticate('XING');
/*    $currentUser = $xing->getUserProfile();

    $displayName = $currentUser->displayName;
    $photoURL    = $currentUser->photoURL;
*/
    $results    = $xing->searchUsers();
    $results = json_encode($results);
    echo $results;
  } else {
    $displayName = 'Anonymous';
    $photoURL    = 'https://www.xing.com/img/n/nobody_m.140x185.jpg';
  }

  /*
  $app->render('index-mat.php', array(
    "displayName" => $displayName,
    "photoURL"    => $photoURL,
    "isLoggedIn"  => $hybridauth->isConnectedWith('XING'),
    "consumerKey" => $config["providers"]["XING"]["keys"]["key"]
  ));
  */
});

$app->get('/search/:keyword', function ($keyword) use ($hybridauth, $config, $app) {
  if ($hybridauth->isConnectedWith('XING')) {
    // Get the existing hybridauth session.
    // In theory `authenticate` could start the handshake,
    // but since we already know that hybridauth isConnectedWith XING,
    // this will work fine.
    $xing        = $hybridauth->authenticate('XING');
    /*    $currentUser = $xing->getUserProfile();

    $displayName = $currentUser->displayName;
    $photoURL    = $currentUser->photoURL;
    */
    $results    = $xing->searchUsersByKeyword($keyword);
    $results = json_encode($results);
    echo $results;
  } else {
    $displayName = 'Anonymous';
    $photoURL    = 'https://www.xing.com/img/n/nobody_m.140x185.jpg';
  }

  /*
  $app->render('index-mat.php', array(
  "displayName" => $displayName,
  "photoURL"    => $photoURL,
  "isLoggedIn"  => $hybridauth->isConnectedWith('XING'),
  "consumerKey" => $config["providers"]["XING"]["keys"]["key"]
));
*/
});

$app->get('/offsearch/:keyword(/:offset)', function ($keyword, $offset) use ($hybridauth, $config, $app) {
  if ($hybridauth->isConnectedWith('XING')) {
    // Get the existing hybridauth session.
    // In theory `authenticate` could start the handshake,
    // but since we already know that hybridauth isConnectedWith XING,
    // this will work fine.
    $xing        = $hybridauth->authenticate('XING');
    /*    $currentUser = $xing->getUserProfile();

    $displayName = $currentUser->displayName;
    $photoURL    = $currentUser->photoURL;
    */
    $results    = $xing->searchUsersByKeywordOff($keyword, $offset);
    $results = json_encode($results);
    echo $results;
  } else {
    $displayName = 'Anonymous';
    $photoURL    = 'https://www.xing.com/img/n/nobody_m.140x185.jpg';
  }

  /*
  $app->render('index-mat.php', array(
  "displayName" => $displayName,
  "photoURL"    => $photoURL,
  "isLoggedIn"  => $hybridauth->isConnectedWith('XING'),
  "consumerKey" => $config["providers"]["XING"]["keys"]["key"]
));
*/
});

$app->get('/search/user/:userid', function ($userid) use ($hybridauth, $config, $app) {
  if ($hybridauth->isConnectedWith('XING')) {
    // Get the existing hybridauth session.
    // In theory `authenticate` could start the handshake,
    // but since we already know that hybridauth isConnectedWith XING,
    // this will work fine.
    $xing        = $hybridauth->authenticate('XING');
    /*    $currentUser = $xing->getUserProfile();

    $displayName = $currentUser->displayName;
    $photoURL    = $currentUser->photoURL;
    */
    //$results    = $xing->searchUsersByKeyword($keyword);

    $results    = $xing->getUserProfileById($userid);
    $results = json_encode($results);
    echo $results;
  } else {
    $displayName = 'Anonymous';
    $photoURL    = 'https://www.xing.com/img/n/nobody_m.140x185.jpg';
  }

  /*
  $app->render('index-mat.php', array(
  "displayName" => $displayName,
  "photoURL"    => $photoURL,
  "isLoggedIn"  => $hybridauth->isConnectedWith('XING'),
  "consumerKey" => $config["providers"]["XING"]["keys"]["key"]
));
*/
});




// start the OAuth handshake
$app->get('/login', function () use ($hybridauth) {
  // HybridAuth will take care to send the user to $config['base_url'],
  // which is the /endpoint route by default. After the handshake,
  // the user will be redirected to the hauth_return_to route.
  $hybridauth->authenticate('XING', array("hauth_return_to" => "http://xapp.bnz-power.com"));
});

// HybridAuth endpoint to handle the OAuth handshake
$app->get('/endpoint', function () use ($config, $app) {
  try {
    // Let HybridAuth handle the OAuth handshake.
    // If successful HybridAuth will redirect to the hauth_return_to URL
    // that is configured when calling $hybridauth->authenticate
    Hybrid_Endpoint::process();
  } catch (Exception $e) {
    $app->render('error.php', array(
      "consumerKey" => $config["providers"]["XING"]["keys"]["key"],
      "error"       => $e
    ));
  }
});

// log the user out
$app->get('/logout', function () use ($hybridauth, $app) {
  $hybridauth->logoutAllProviders();
  $app->redirect('http://xapp.bnz-power.com');
});

$app->run();
