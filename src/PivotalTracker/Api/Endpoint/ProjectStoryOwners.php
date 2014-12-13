<?php

namespace PivotalTracker\Api\Endpoint;

use PivotalTracker\Api;

/**
* ProjectStoryOwners
*/
class ProjectStoryOwners extends Api\Endpoint
{
    protected $_endpoint = '/projects/{project_id}/stories/{story_id}/owners';

    protected $_returnsList = false;

    protected $_resourceType = 'person';

    protected $_canPaginate = false;

    protected $_allowedMethods = array(
        Api::HTTP_METHOD_GET,
        Api::HTTP_METHOD_POST,
    );

    protected $_allowedFields = array();

    protected $_additionalParameters = array(
        Api::HTTP_METHOD_GET    => array(),
        Api::HTTP_METHOD_POST    => array(
            'id',
        ),
    );
}
