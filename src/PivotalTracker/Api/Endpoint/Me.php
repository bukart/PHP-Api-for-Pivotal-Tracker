<?php

namespace PivotalTracker\Api\Endpoint;

use PivotalTracker\Api;

/**
* Me
*/
class Me extends Api\Endpoint
{
    protected $_endpoint = '/me';

    protected $_returnsList = false;

    protected $_resourceType = 'me';

    protected $_canPaginate = false;

    protected $_allowedMethods = array(
        Api::HTTP_METHOD_GET,
    );

    protected $_allowedFields = array(
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

    protected $_additionalParameters = array(
        Api::HTTP_METHOD_GET    => array(),
    );
}
