<?php

namespace PivotalTracker\Api\Endpoint;

use PivotalTracker\Api;

/**
* ProjectExport
*/
class ProjectExport extends Api\Endpoint
{
    protected $_endpoint = '/projects/{project_id}/export';

    protected $_returnsList = false;

    protected $_resourceType = 'project_export';

    protected $_canPaginate = false;

    protected $_allowedMethods = array(
        Api::HTTP_METHOD_POST,
    );

    protected $_allowedFields = array();

    protected $_additionalParameters = array(
        Api::HTTP_METHOD_POST   => array(),
    );
}
