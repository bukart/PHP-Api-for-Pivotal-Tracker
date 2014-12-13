<?php

namespace PivotalTracker\Api\Endpoint;

use PivotalTracker\Api;

/**
* ProjectStoryTasks
*/
class ProjectStoryTasks extends Api\Endpoint
{
    protected $_endpoint = '/projects/{project_id}/stories/{story_id}/tasks';

    protected $_returnsList = true;

    protected $_resourceType = 'task';

    protected $_canPaginate = false;

    protected $_allowedMethods = array(
        Api::HTTP_METHOD_GET,
        Api::HTTP_METHOD_POST,
    );

    protected $_allowedFields = array();

    protected $_additionalParameters = array(
        Api::HTTP_METHOD_GET    => array(),
        Api::HTTP_METHOD_POST   => array(
            'description',
            'complete',
            'position',
        ),
    );
}
