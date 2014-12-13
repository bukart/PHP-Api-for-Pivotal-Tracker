<?php

namespace PivotalTracker\Api\Endpoint;

use PivotalTracker\Api;

/**
* ProjectEpicComments
*/
class ProjectEpicComments extends Api\Endpoint
{
    protected $_endpoint = '/projects/{project_id}/epics/{epic_id}/comments';

    protected $_returnsList = true;

    protected $_resourceType = 'comment';

    protected $_canPaginate = false;

    protected $_allowedMethods = array(
        Api::HTTP_METHOD_GET,
        Api::HTTP_METHOD_POST,
    );

    protected $_allowedFields = array();

    protected $_additionalParameters = array(
        Api::HTTP_METHOD_GET    => array(),
        Api::HTTP_METHOD_POST   => array(
            'text',
            'person_id',
            'file_attachments',
            'google_attachments',
            'commit_identifier',
            'commit_type',
        ),
    );
}
