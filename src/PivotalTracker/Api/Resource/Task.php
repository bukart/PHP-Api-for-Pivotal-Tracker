<?php

namespace PivotalTracker\Api\Resource;

use \PivotalTracker\Api;

/**
* Task
*/
class Task extends Api\Resource
{
    protected $_fields = array(
        'id',
        'story_id',
        'description',
        'complete',
        'position',
        'created_at',
        'updated_at',
        'kind',
    );
}
