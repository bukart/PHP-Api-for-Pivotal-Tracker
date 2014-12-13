<?php

namespace PivotalTracker\Api\Endpoint;

use PivotalTracker\Api;

/**
* AccountSummaries
*/
class AccountSummaries extends Api\Endpoint
{
    protected $_endpoint = '/account_summaries';

    protected $_returnsList = true;

    protected $_resourceType = 'account_summary';

    protected $_canPaginate = false;

    protected $_allowedMethods = array(
        Api::HTTP_METHOD_GET,
    );

    protected $_allowedFields = array();

    protected $_additionalParameters = array(
        Api::HTTP_METHOD_GET    => array(
            'with_permission',
        ),
    );
}
