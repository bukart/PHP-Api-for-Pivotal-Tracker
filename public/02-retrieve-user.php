<?php

use PivotalTracker\App as PT;

$cwd = getcwd();
require_once dirname(dirname(__FILE__)) . '/bootstrap.php';

$token = 'API_ACCESS_TOKEN';

echo "Initializing api with token \n";

PT::init($token);

echo "Retrieving current user \n";
echo "... retrieving ...\r";

$me = PT::api()->get(PT::api()->createEndpoint('me')->setFields(array('id','name')));

echo sprintf("Received current user \"%s\" [%s] \n", $me->name, $me->id);
