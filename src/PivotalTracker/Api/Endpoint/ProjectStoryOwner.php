<?php

namespace PivotalTracker\Api\Endpoint;

use PivotalTracker\Api;

/**
* ProjectStoryOwner
*/
class ProjectStoryOwner extends Api\Endpoint
{
    protected $_endpoint = '/projects/{project_id}/stories/{story_id}/owners/{person_id}';

    protected $_returnsList = false;

    protected $_resourceType = 'person';

    protected $_canPaginate = false;

    protected $_allowedMethods = array(
        Api::HTTP_METHOD_DELETE,
    );

    protected $_allowedFields = array();

    protected $_additionalParameters = array(
        Api::HTTP_METHOD_DELETE    => array(),
    );
}
