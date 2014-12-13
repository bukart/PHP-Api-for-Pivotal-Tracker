<?php

namespace PivotalTracker\Api\Endpoint;

use PivotalTracker\Api;

/**
* ProjectIntegrationStories
*/
class ProjectIntegrationStories extends Api\Endpoint
{
    protected $_endpoint = '/projects/{project_id}/integrations/{integration_id}/stories';

    protected $_returnsList = false;

    protected $_resourceType = 'external_story';

    protected $_canPaginate = false;

    protected $_allowedMethods = array(
        Api::HTTP_METHOD_GET,
    );

    protected $_allowedFields = array();

    protected $_additionalParameters = array(
        Api::HTTP_METHOD_GET    => array(
            'exclude_linked',
        ),
    );
}
