<?php

namespace PivotalTracker\Api\Endpoint;

use PivotalTracker\Api;

/**
* MyNotifications
*/
class MyNotifications extends Api\Endpoint
{
    protected $_endpoint = '/my/notifications';

    protected $_returnsList = true;

    protected $_resourceType = 'notification';

    protected $_canPaginate = false;

    protected $_allowedMethods = array(
        Api::HTTP_METHOD_GET,
    );

    protected $_allowedFields = array();

    protected $_additionalParameters = array(
        Api::HTTP_METHOD_GET    => array(
            'created_after',
        ),
    );
}
