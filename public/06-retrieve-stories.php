<?php

use PivotalTracker\App as PT;

$cwd = getcwd();
require_once dirname(dirname(__FILE__)) . '/bootstrap.php';

$token = 'API_ACCESS_TOKEN';
$projectId = 'PROJECT_ID';

echo "Initializing api with token \n";

PT::init($token);

echo sprintf("Retrieving project's [%s] stories \n", $projectId);
echo "... retrieving ...\r";

$stories = PT::api()->get(PT::api()->createEndpoint('project_stories')->setParam('project_id', $projectId));
$response = PT::api()->getResponse();
$paginition = $response->getMeta()->getPagination();

echo sprintf("Received %d stories. \n", $paginition['returned']);
echo sprintf("Project has %d stories in total. \n", $paginition['total']);
