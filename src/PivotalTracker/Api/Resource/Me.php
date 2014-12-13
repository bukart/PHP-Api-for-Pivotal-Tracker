<?php

namespace PivotalTracker\Api\Resource;

use \PivotalTracker\Api;

/**
* Me
*/
class Me extends Api\Resource
{
    protected $_fields = array(
        'id',
        'name',
        'initials',
        'username',
        'time_zone',
        'api_token',
        'has_google_identity',
        'projects',
        'project_ids',
        'workspaces',
        'workspace_ids',
        'email',
        'receives_in_app_notifications',
        'created_at',
        'updated_at',
        'kind',
    );
}
