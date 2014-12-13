<?php

namespace PivotalTracker\Api\Resource;

use \PivotalTracker\Api;

/**
* AccountSummary
*/
class AccountSummary extends Api\Resource
{
    protected $_fields = array(
        'id',
        'name',
        'status',
        'days_left',
        'over_the_limit',
        'owner',
        'owner_id',
        'admins',
        'admin_ids',
        'permissions',
        'number_of_projects',
        'number_of_private_projects',
        'project_limit',
        'kind',
    );
}
