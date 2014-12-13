<?php

namespace PivotalTracker\Api\Endpoint;

use PivotalTracker\Api;

/**
* PeopleNotificationsSince
*/
class PeopleNotificationsSince extends Api\Endpoint
{
    protected $_endpoint = '/people/{person_id}/notifications/since/{timestamp}';

    protected $_returnsList = true;

    protected $_resourceType = 'notification';

    protected $_canPaginate = false;

    protected $_allowedMethods = array(
        Api::HTTP_METHOD_GET,
    );

    protected $_allowedFields = array();

    protected $_additionalParameters = array(
        Api::HTTP_METHOD_GET    => array(),
    );
}
