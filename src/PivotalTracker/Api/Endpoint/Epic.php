<?php

namespace PivotalTracker\Api\Endpoint;

use PivotalTracker\Api;

/**
* Epic
*/
class Epic extends Api\Endpoint
{
    protected $_endpoint = '/epics/{epic_id}';

    protected $_returnsList = false;

    protected $_resourceType = 'epic';

    protected $_canPaginate = false;

    protected $_allowedMethods = array(
        Api::HTTP_METHOD_GET,
    );

    protected $_allowedFields = array();

    protected $_additionalParameters = array(
        Api::HTTP_METHOD_GET    => array(),
    );
}
