<?php

namespace PivotalTracker\Api\Endpoint;

use PivotalTracker\Api;

/**
* MyNotificationsMarkRead
*/
class MyNotificationsMarkRead extends Api\Endpoint
{
    protected $_endpoint = '/my/notifications/mark_read';

    protected $_returnsList = false;

    protected $_resourceType = 'notification';

    protected $_canPaginate = false;

    protected $_allowedMethods = array(
        Api::HTTP_METHOD_PUT,
    );

    protected $_allowedFields = array();

    protected $_additionalParameters = array(
        Api::HTTP_METHOD_PUT    => array(
            'before',
        ),
    );
}
