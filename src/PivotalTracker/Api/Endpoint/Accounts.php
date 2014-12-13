<?php

namespace PivotalTracker\Api\Endpoint;

use PivotalTracker\Api;

/**
* Accounts
*/
class Accounts extends Api\Endpoint
{
    protected $_endpoint = '/accounts';

    protected $_returnsList = true;

    protected $_resourceType = 'account';

    protected $_canPaginate = false;

    protected $_allowedMethods = array(
        Api::HTTP_METHOD_GET,
    );

    protected $_allowedFields = array();

    protected $_additionalParameters = array(
        Api::HTTP_METHOD_GET    => array(),
    );
}
