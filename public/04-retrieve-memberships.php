<?php

use PivotalTracker\App as PT;

$cwd = getcwd();
require_once dirname(dirname(__FILE__)) . '/bootstrap.php';

$token = 'API_ACCESS_TOKEN';
$projectId = 'PROJECT_ID';

echo "Initializing api with token \n";

PT::init($token);

echo sprintf("Retrieving project's [%s] memberships \n", $projectId);
echo "... retrieving ...\r";

$memberships = PT::api()->get(
    PT::api()->createEndpoint('project_memberships')
        ->setParam('project_id', $projectId)
        ->setFields(array('person', 'role'))
);

echo sprintf("Received %d memberships \n", count($memberships));
foreach ($memberships as $membership) {
    echo sprintf("  - %-8s \"%s\" [%d] \n", $membership->role, $membership->person->name, $membership->person->id);
}
