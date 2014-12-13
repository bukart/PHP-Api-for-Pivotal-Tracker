<?php

namespace PivotalTracker\Api\Resource;

use \PivotalTracker\Api;

/**
* Label
*/
class Label extends Api\Resource
{
    protected $_fields = array(
        'id',
        'project_id',
        'name',
        'created_at',
        'updated_at',
        'counts',
        'kind',
    );
}
