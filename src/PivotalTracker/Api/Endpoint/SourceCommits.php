<?php

namespace PivotalTracker\Api\Endpoint;

use PivotalTracker\Api;

/**
* SourceCommits
*/
class SourceCommits extends Api\Endpoint
{
    protected $_endpoint = '/source_commits';

    protected $_returnsList = false;

    protected $_resourceType = 'source_commit';

    protected $_canPaginate = false;

    protected $_allowedMethods = array(
        Api::HTTP_METHOD_POST,
    );

    protected $_allowedFields = array();

    protected $_additionalParameters = array(
        Api::HTTP_METHOD_POST   => array(
            'source_commit',
        ),
    );
}
