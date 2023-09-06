<?php

// index.php interface configuration
$title = "Generate Tokens";
$img = "https://clickhelp.co/images/feeds/blog/2016.05/keys.jpg";
$scope_info = "This service requires the following permissions for your account:";

// Client configuration
$issuer = "https://login.garde.waskita.co.id";
$client_id = "bdd9b009-b608-4822-b98d-3c5f35352f2d";
$client_secret = "779bd1ba-8048-4599-bc8e-aaf7ef87d270";
$redirect_url = env('APP_ENV') == 'local' ? "http://localhost/Php/refreshtoken.php" : "https://dev-qhse.akaka.co/refreshtoken";
$redirect = env('APP_ENV') == 'local' ? "http://localhost/Php/logout.php" : "https://dev-qhse.akaka.co/logout";
// add scopes as keys and a friendly message of the scope as value
$scopesDefine = array('openid' => 'log in using your identity',
        'api.auth' => 'read your api',
        'user.read' => 'read your api',
        'user.readAll' => 'read your api',
        'user.role' => 'read your api',
        'email' => 'read your email',
        'profile' => 'read your basic profile info');

// refreshtoken.php interface configuration
$refresh_token_note = "NOTE: New refresh tokens expire in 12 months.";
$access_token_note = "NOTE: New access tokens expire in 1 hour.";
$manage_token_note = "You can manage your refresh tokens in the following link: ";
$manageTokens = "http://localhost:5000/connect/token";
?>

