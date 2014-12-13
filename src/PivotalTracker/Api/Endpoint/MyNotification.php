<?php

namespace PivotalTracker\Api\Endpoint;

use PivotalTracker\Api;

/**
* MyNotification
*/
class MyNotification extends Api\Endpoint
{
    protected $_endpoint = '/my/notifications/{notification_id}';

    protected $_returnsList = false;

    protected $_resourceType = 'notification';

    protected $_canPaginate = false;

    protected $_allowedMethods = array(
        Api::HTTP_METHOD_PUT,
    );

    protected $_allowedFields = array();

    protected $_additionalParameters = array(
        Api::HTTP_METHOD_PUT    => array(
            'read_at',
        ),
    );
}
