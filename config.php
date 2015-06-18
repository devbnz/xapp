<?php

// Hybrid-Auth Config file: http://hybridauth.sourceforge.net/userguide/Configuration.html

$config =
  array(
    "base_url" => "http://xapp.bnz-power.com/endpoint",
    "providers" => array(
      "XING" => array(
        "enabled" => true,
        // go to https://dev.xing.com/applications and create an app to get a test key
        "keys"    => array("key" => "fab188b7a54692933254", "secret" => "d5187f5fee165c2b8afee21bed62ba237a38f62d"),
        "wrapper" => array("path" => "hybridauth-master/additional-providers/hybridauth-xing/Providers/XING.php", "class" => "Hybrid_Providers_XING")
      )
    )
  );
