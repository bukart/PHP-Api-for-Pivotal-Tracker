<?php

use PivotalTracker\App as PT;

$cwd = getcwd();
require_once dirname(dirname(__FILE__)) . '/bootstrap.php';

$username = 'USERNAME';
$password = 'PASSWORD';

echo "Retrieving api token via user credentials \n";
echo "... retrieving ...\r";

$token = PT::api()->retrieveToken($username, $password);

echo sprintf("Received api token '%s' \n", $token);
echo "Initializing api with received token \n";

PT::init($token);
