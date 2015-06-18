<?php

// Hybrid-Auth Config file: http://hybridauth.sourceforge.net/userguide/Configuration.html

$config =
  array(
    "base_url" => "http://PATHTOINDEX.php/endpoint",
    "providers" => array(
      "XING" => array(
        "enabled" => true,
        // go to https://dev.xing.com/applications and create an app to get a test key
        "keys"    => array("key" => "YOURKEY", "secret" => "YOURSECRET"),
        "wrapper" => array("path" => "hybridauth-master/additional-providers/hybridauth-xing/Providers/XING.php", "class" => "Hybrid_Providers_XING")
      )
    )
  );
