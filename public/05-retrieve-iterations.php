<?php

use PivotalTracker\App as PT;

$cwd = getcwd();
require_once dirname(dirname(__FILE__)) . '/bootstrap.php';

$token = 'API_ACCESS_TOKEN';
$projectId = 'PROJECT_ID';

echo "Initializing api with token \n";

PT::init($token);

echo sprintf("Retrieving project's [%s] current iteration \n", $projectId);
echo "... retrieving ...\r";

$iterations = PT::api()->get(
    PT::api()->createEndpoint('project_iterations')
        ->setParam('project_id', $projectId)
        // ->setAdditionalGetParameters(array('scope' => 'current'))
        ->setFields(array('number', 'story_ids', 'finish')),
    array('scope' => 'current')
);
$current = reset($iterations);

echo sprintf("Received current iteration #%s \n", $current->number);
echo sprintf("  - current has %d stories \n", count($current->story_ids));
echo sprintf("  - current finishes at %s \n", $current->finish);



echo sprintf("Retrieving project's [%s] iterations \n", $projectId);
echo "... retrieving ...\r";

$iterations = PT::api()->get(
    PT::api()->createEndpoint('project_iterations')
        ->setParam('project_id', $projectId)
        ->setFields('number')
);
$response = PT::api()->getResponse();
$paginition = $response->getMeta()->getPagination();

echo sprintf("Received %d iterations \n", $paginition['returned']);
echo sprintf("Project has %d iterations in total \n", $paginition['total']);
