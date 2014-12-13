<?php

namespace PivotalTracker\Api\Endpoint;

use PivotalTracker\Api;

/**
* ProjectMembership
*/
class ProjectMembership extends Api\Endpoint
{
    protected $_endpoint = '/projects/{project_id}/memberships/{membership_id}';

    protected $_returnsList = false;

    protected $_resourceType = 'project_membership';

    protected $_canPaginate = false;

    protected $_allowedMethods = array(
        Api::HTTP_METHOD_GET,
        Api::HTTP_METHOD_PUT,
        Api::HTTP_METHOD_DELETE,
    );

    protected $_allowedFields = array();

    protected $_additionalParameters = array(
        Api::HTTP_METHOD_GET    => array(),
        Api::HTTP_METHOD_PUT    => array(
            'role',
            'project_color',
        ),
        Api::HTTP_METHOD_DELETE => array(),
    );
}
