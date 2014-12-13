<?php

namespace PivotalTracker\Api\Endpoint;

use PivotalTracker\Api;

/**
* ProjectStoryTask
*/
class ProjectStoryTask extends Api\Endpoint
{
    protected $_endpoint = '/projects/{project_id}/stories/{story_id}/tasks/{task_id}';

    protected $_returnsList = false;

    protected $_resourceType = 'task';

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
            'description',
            'complete',
            'position',
        ),
        Api::HTTP_METHOD_DELETE => array(),
    );
}
