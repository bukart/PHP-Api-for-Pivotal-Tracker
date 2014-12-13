<?php

namespace PivotalTracker\Api\Endpoint;

use PivotalTracker\Api;

/**
* ProjectMemberships
*/
class ProjectMemberships extends Api\Endpoint
{
    protected $_endpoint = '/projects/{project_id}/memberships';

    protected $_returnsList = true;

    protected $_resourceType = 'project_membership';

    protected $_canPaginate = false;

    protected $_allowedMethods = array(
        Api::HTTP_METHOD_GET,
        Api::HTTP_METHOD_POST,
    );

    protected $_allowedFields = array();

    protected $_additionalParameters = array(
        Api::HTTP_METHOD_GET    => array(),
        Api::HTTP_METHOD_POST    => array(
            'person_id',
            'role',
            'email',
            'name',
            'initials',
            'project_color',
        ),
    );
}
