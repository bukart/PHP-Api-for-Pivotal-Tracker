<?php

namespace PivotalTracker\Api\Resource;

use \PivotalTracker\Api;

/**
* AccountMembership
*/
class AccountMembership extends Api\Resource
{
    protected $_fields = array(
        'id',
        'person',
        'person_id',
        'account_id',
        'created_at',
        'updated_at',
        'owner',
        'admin',
        'project_creator',
        'timekeeper',
        'time_enterer',
        'kind',
    );
}
