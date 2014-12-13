<?php

namespace PivotalTracker\Api\Endpoint;

use PivotalTracker\Api;

/**
* ProjectEpicActivity
*/
class ProjectEpicActivity extends Api\Endpoint
{
    protected $_endpoint = '/projects/{project_id}/epics/{epic_id}/activity';

    protected $_returnsList = true;

    protected $_resourceType = 'activity';

    protected $_canPaginate = true;

    protected $_allowedMethods = array(
        Api::HTTP_METHOD_GET,
    );

    protected $_allowedFields = array();

    protected $_additionalParameters = array(
        Api::HTTP_METHOD_GET        => array(
            'occurred_before',
            'occurred_after',
            'since_version',
        ),
    );
}
