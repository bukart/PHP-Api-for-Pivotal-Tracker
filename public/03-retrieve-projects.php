<?php

use PivotalTracker\App as PT;

$cwd = getcwd();
require_once dirname(dirname(__FILE__)) . '/bootstrap.php';

$token = 'API_ACCESS_TOKEN';

echo "Initializing api with token \n";

PT::init($token);

echo "Retrieving current user's projects \n";
echo "... retrieving ...\r";

$projects = PT::api()->get(PT::api()->createEndpoint('projects')->setFields(array('id', 'name')));

echo sprintf("Current users has access to %d projects \n", count($projects));
foreach ($projects as $project) {
    echo sprintf("  - \"%s\" [%s] \n", $project->name, $project->id);
}
