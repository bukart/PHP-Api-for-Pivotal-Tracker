<?php

namespace PivotalTracker\Api\Endpoint;

use PivotalTracker\Api;

/**
* Account
*/
class Account extends Api\Endpoint
{
    protected $_endpoint = '/accounts/{account_id}';

    protected $_returnsList = false;

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
