<?php

namespace PivotalTracker\Api\Resource;

use \PivotalTracker\Api;

/**
* Account
*/
class Account extends Api\Resource
{
    protected $_fields = array(
        'id',
        'name',
        'plan',
        'status',
        'days_left',
        'over_the_limit',
        'created_at',
        'updated_at',
        'projects',
        'project_ids',
        'kind',
    );
}
