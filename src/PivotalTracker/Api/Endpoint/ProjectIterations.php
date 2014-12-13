<?php

namespace PivotalTracker\Api\Endpoint;

use PivotalTracker\Api;

/**
* ProjectIterations
*/
class ProjectIterations extends Api\Endpoint
{
    protected $_endpoint = '/projects/{project_id}/iterations';

    protected $_returnsList = true;

    protected $_resourceType = 'iteration';

    protected $_canPaginate = true;

    protected $_allowedMethods = array(
        Api::HTTP_METHOD_GET,
    );

    protected $_allowedFields = array();

    protected $_additionalParameters = array(
        Api::HTTP_METHOD_GET    => array(
            'scope',
        ),
    );
}
