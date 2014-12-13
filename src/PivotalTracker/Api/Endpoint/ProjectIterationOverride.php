<?php

namespace PivotalTracker\Api\Endpoint;

use PivotalTracker\Api;

/**
* ProjectIterationOverride
*/
class ProjectIterationOverride extends Api\Endpoint
{
    protected $_endpoint = '/projects/{project_id}/iteration_overrides/{iteration_number}';

    protected $_returnsList = false;

    protected $_resourceType = 'iteration';

    protected $_canPaginate = false;

    protected $_allowedMethods = array(
        Api::HTTP_METHOD_PUT,
    );

    protected $_allowedFields = array();

    protected $_additionalParameters = array(
        Api::HTTP_METHOD_PUT    => array(
            'length',
            'team_strength',
        ),
    );
}
