<?php

namespace PivotalTracker\Api\Endpoint;

use PivotalTracker\Api;

/**
* MyWorkspace
*/
class MyWorkspace extends Api\Endpoint
{
    protected $_endpoint = '/aggregator';

    protected $_returnsList = false;

    protected $_resourceType = 'aggregator';

    protected $_canPaginate = false;

    protected $_allowedMethods = array(
        Api::HTTP_METHOD_GET,
        Api::HTTP_METHOD_DELETE,
        Api::HTTP_METHOD_PUT,
    );

    protected $_allowedFields = array();

    protected $_additionalParameters = array(
        Api::HTTP_METHOD_GET    => array(),
        Api::HTTP_METHOD_PUT    => array(
            'name',
            'project_ids',
        ),
        Api::HTTP_METHOD_DELETE => array(),
    );
}
