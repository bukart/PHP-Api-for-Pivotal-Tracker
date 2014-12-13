<?php

namespace PivotalTracker\Api\Endpoint;

use PivotalTracker\Api;

/**
* StoriesExport
*/
class StoriesExport extends Api\Endpoint
{
    protected $_endpoint = '/stories/export';

    protected $_returnsList = false;

    protected $_resourceType = 'stories_export';

    protected $_canPaginate = false;

    protected $_allowedMethods = array(
        Api::HTTP_METHOD_POST,
    );

    protected $_allowedFields = array();

    protected $_additionalParameters = array(
        Api::HTTP_METHOD_POST   => array(),
    );
}
