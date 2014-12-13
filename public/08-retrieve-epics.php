<?php

use PivotalTracker\App as PT;

$cwd = getcwd();
require_once dirname(dirname(__FILE__)) . '/bootstrap.php';

$token = 'API_ACCESS_TOKEN';
$projectId = 'PROJECT_ID';

echo "Initializing api with token \n";

PT::init($token);

echo sprintf("Retrieving project's [%s] epics \n", $projectId);
echo "... retrieving ...\r";

$epics = PT::api()->get(
    PT::api()->createEndpoint('project_epics')
        ->setParam('project_id', $projectId)
        ->setFields('id')
);

echo sprintf("Received %d epics \n", count($epics));
