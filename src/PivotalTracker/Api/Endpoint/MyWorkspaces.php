<?php

namespace PivotalTracker\Api\Endpoint;

use PivotalTracker\Api;

/**
* MyWorkspaces
*/
class MyWorkspaces extends Api\Endpoint
{
    protected $_endpoint = '/my/workspaces';

    protected $_returnsList = false;

    protected $_resourceType = 'workspace';

    protected $_canPaginate = false;

    protected $_allowedMethods = array(
        Api::HTTP_METHOD_GET,
        Api::HTTP_METHOD_POST,
    );

    protected $_allowedFields = array();

    protected $_additionalParameters = array(
        Api::HTTP_METHOD_GET    => array(),
        Api::HTTP_METHOD_POST   => array(
            'name',
            'project_ids',
        ),
    );
}
