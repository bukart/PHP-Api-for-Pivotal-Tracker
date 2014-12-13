<?php

namespace PivotalTracker\Api\Endpoint;

use PivotalTracker\Api;

/**
* ProjectEpicComment
*/
class ProjectEpicComment extends Api\Endpoint
{
    protected $_endpoint = '/projects/{project_id}/epics/{epic_id}/comments/{comment_id}';

    protected $_returnsList = false;

    protected $_resourceType = 'comment';

    protected $_canPaginate = false;

    protected $_allowedMethods = array(
        Api::HTTP_METHOD_GET,
        Api::HTTP_METHOD_PUT,
        Api::HTTP_METHOD_DELETE,
    );

    protected $_allowedFields = array();

    protected $_additionalParameters = array(
        Api::HTTP_METHOD_GET    => array(),
        Api::HTTP_METHOD_PUT   => array(
            'text',
        ),
        Api::HTTP_METHOD_DELETE    => array(),
    );
}
