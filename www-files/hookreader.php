<?php

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Parse php.ini
    $settings          = parse_ini_file(realpath("../hookreader.ini"), true);
    $GitHubSettings    = $settings['GitHub'];
    $githubSecret      = $GitHubSettings['githubSecret'];

  	$body              = file_get_contents('php://input');
    $objson            = json_decode($body);

    // JSON data
    $zen               = $objson->zen;
    $hook              = $objson->hook;
    $id                = $hook->id;
    $config            = $hook->config;
    $content_type      = $config->content_type;

    // Headers
    $githubSignature   = $_SERVER['HTTP_X_HUB_SIGNATURE'];
    $githubUserAgent   = $_SERVER['HTTP_USER_AGENT'];
    $githubDelivery    = $_SERVER['HTTP_X_GITHUB_DELIVERY'];
    $githubEvent       = $_SERVER['HTTP_X_GITHUB_EVENT'];

    // Calculated HMAC hexdigest
    $myGitHubSignature = 'sha1='.hash_hmac('sha1', $body, $githubSecret);


    // Test to see if this is a legitimate request from GitHub
    if ($githubSignature === $myGitHubSignature) {

    	echo $zen . PHP_EOL;
    	echo 'Hook ID:           '.$id . PHP_EOL;
    	echo 'content_type:      '.$content_type . PHP_EOL . PHP_EOL;

        echo 'myGitHubSignature: '.$myGitHubSignature . PHP_EOL;
    	echo 'githubSignature:   '.$githubSignature . PHP_EOL;
    	echo 'githubUserAgent:   '.$githubUserAgent . PHP_EOL;
    	echo 'githubDelivery:    '.$githubDelivery . PHP_EOL;
    	echo 'githubEvent:       '.$githubEvent . PHP_EOL;

    } else {

      echo 'signature:           '.$signature . PHP_EOL;
      echo 'myGitHubSignature:   '.$myGitHubSignature . PHP_EOL;

      die('Signature is not valid' . PHP_EOL);

    }

  } elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {

  	echo "Hello, you sent me a GET... I prefer to be POSTed to." . PHP_EOL;

  } 
?>