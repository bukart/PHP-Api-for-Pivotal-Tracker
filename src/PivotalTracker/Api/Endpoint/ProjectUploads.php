<?php

namespace PivotalTracker\Api\Endpoint;

use PivotalTracker\Api;

/**
* ProjectSearch
*/
class ProjectSearch extends Api\Endpoint
{
    protected $_endpoint = '/projects/{project_id}/search';

    protected $_returnsList = false;

    protected $_resourceType = 'search';

    protected $_canPaginate = false;

    protected $_allowedMethods = array(
        Api::HTTP_METHOD_GET,
    );

    protected $_allowedFields = array();

    protected $_additionalParameters = array(
        Api::HTTP_METHOD_GET    => array(),
    );
}
