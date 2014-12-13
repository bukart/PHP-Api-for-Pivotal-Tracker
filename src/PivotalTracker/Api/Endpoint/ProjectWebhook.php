<?php

namespace PivotalTracker\Api\Endpoint;

use PivotalTracker\Api;

/**
* ProjectWebhook
*/
class ProjectWebhook extends Api\Endpoint
{
    protected $_endpoint = '/projects/{project_id}/webhooks/{webhook_id}';

    protected $_returnsList = false;

    protected $_resourceType = 'webhook';

    protected $_canPaginate = false;

    protected $_allowedMethods = array(
        Api::HTTP_METHOD_GET,
        Api::HTTP_METHOD_PUT,
        Api::HTTP_METHOD_DELETE,
    );

    protected $_allowedFields = array();

    protected $_additionalParameters = array(
        Api::HTTP_METHOD_GET    => array(),
        Api::HTTP_METHOD_PUT    => array(
            'webhook_url',
            'webhook_version',
        ),
        Api::HTTP_METHOD_DELETE => array(),
    );
}
