<?php

namespace PivotalTracker\Api\Endpoint;

use PivotalTracker\Api;

/**
* Aggregator
*/
class Aggregator extends Api\Endpoint
{
    protected $_endpoint = '/aggregator';

    protected $_returnsList = false;

    protected $_resourceType = 'aggregator';

    protected $_canPaginate = false;

    protected $_allowedMethods = array(
        Api::HTTP_METHOD_POST,
    );

    protected $_allowedFields = array();

    protected $_additionalParameters = array(
        Api::HTTP_METHOD_POST   => array(),
    );
}
