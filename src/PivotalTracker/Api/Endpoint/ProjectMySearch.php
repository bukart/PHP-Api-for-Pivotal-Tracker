<?php

namespace PivotalTracker\Api\Endpoint;

use PivotalTracker\Api;

/**
* ProjectMySearch
*/
class ProjectMySearch extends Api\Endpoint
{
    protected $_endpoint = '/projects/{project_id}/my/searches/{search_id}';

    protected $_returnsList = true;

    protected $_resourceType = 'saved_search';

    protected $_canPaginate = false;

    protected $_allowedMethods = array(
        Api::HTTP_METHOD_DELETE,
    );

    protected $_allowedFields = array();

    protected $_additionalParameters = array(
        Api::HTTP_METHOD_DELETE    => array(),
    );
}
