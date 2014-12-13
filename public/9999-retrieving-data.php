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



echo "Retrieving current user \n";
echo "... retrieving ...\r";

$me = PT::api()->get(PT::api()->createEndpoint('me')->setFields(array('id','name')));

echo sprintf("Received current user \"%s\" [%s] \n", $me->name, $me->id);



echo "Retrieving current user's projects \n";
echo "... retrieving ...\r";

$projects = PT::api()->get(PT::api()->createEndpoint('projects')->setFields(array('id', 'name')));

echo sprintf("Current users has access to %d projects \n", count($projects));
foreach ($projects as $project) {
    echo sprintf("  - \"%s\" [%s] \n", $project->name, $project->id);
}

$project = reset($projects);
$projectId = $project->id;



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



echo sprintf("Retrieving project's [%s] stories \n", $projectId);
echo "... retrieving ...\r";

$stories = PT::api()->get(PT::api()->createEndpoint('project_stories')->setParam('project_id', $projectId)->setFields('id'));
$response = PT::api()->getResponse();
$paginition = $response->getMeta()->getPagination();

echo sprintf("Received %d stories. \n", $paginition['returned']);
echo sprintf("Project has %d stories in total. \n", $paginition['total']);



echo sprintf("Retrieving project's [%s] labels \n", $projectId);
echo "... retrieving ...\r";

$labels = PT::api()->get(
    PT::api()->createEndpoint('project_labels')
        ->setParam('project_id', $projectId)
        ->setFields('id')
);

echo sprintf("Received %d labels \n", count($labels));



echo sprintf("Retrieving project's [%s] epics \n", $projectId);
echo "... retrieving ...\r";

$epics = PT::api()->get(
    PT::api()->createEndpoint('project_epics')
        ->setParam('project_id', $projectId)
        ->setFields('id')
);

echo sprintf("Received %d epics \n", count($epics));
