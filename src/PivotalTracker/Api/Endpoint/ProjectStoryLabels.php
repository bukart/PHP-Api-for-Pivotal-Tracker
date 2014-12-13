<?php

namespace PivotalTracker\Api\Endpoint;

use PivotalTracker\Api;

/**
* ProjectStoryLabels
*/
class ProjectStoryLabels extends Api\Endpoint
{
    protected $_endpoint = '/projects/{project_id}/stories/{story_id}/labels';

    protected $_returnsList = true;

    protected $_resourceType = 'label';

    protected $_canPaginate = false;

    protected $_allowedMethods = array(
        Api::HTTP_METHOD_GET,
        Api::HTTP_METHOD_POST,
    );

    protected $_allowedFields = array();

    protected $_additionalParameters = array(
        Api::HTTP_METHOD_GET    => array(),
        Api::HTTP_METHOD_POST   => array(
            'id',
            'name',
        ),
    );
}
