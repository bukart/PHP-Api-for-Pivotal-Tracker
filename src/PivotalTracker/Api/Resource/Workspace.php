<?php

namespace PivotalTracker\Api\Resource;

use \PivotalTracker\Api;

/**
* Workspace
*/
class Workspace extends Api\Resource
{
    protected $_fields = array(
        'id',
        'name',
        'person',
        'person_id',
        'projects',
        'project_ids',
        'kind',
    );
}
