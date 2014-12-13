<?php

namespace PivotalTracker\Api\Resource;

use \PivotalTracker\Api;

/**
* Activity
*/
class Activity extends Api\Resource
{
    protected $_fields = array(
        'kind',
        'guid',
        'project_version',
        'message',
        'highlight',
        'changes',
        'primary_resources',
        'project',
        'project_id',
        'performed_by',
        'performed_by_id',
        'occurred_at',
    );
}
