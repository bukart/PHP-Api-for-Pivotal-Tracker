<?php

namespace PivotalTracker\Api\Endpoint;

use PivotalTracker\Api;

/**
* ProjectIntegrations
*/
class ProjectIntegrations extends Api\Endpoint
{
    protected $_endpoint = '/projects/{project_id}/integrations';

    protected $_returnsList = true;

    protected $_resourceType = 'integration';

    protected $_canPaginate = false;

    protected $_allowedMethods = array(
        Api::HTTP_METHOD_GET,
        Api::HTTP_METHOD_POST,
    );

    protected $_allowedFields = array();

    protected $_additionalParameters = array(
        Api::HTTP_METHOD_GET    => array(),
        Api::HTTP_METHOD_POST   => array(
            'type',
            'api_username',
            'api_password',
            'zendesk_user_email',
            'zendesk_user_password',
            'view_id',
            'company',
            'product',
            'component',
            'statuses_to_exclude',
            'filter_id',
            'account',
            'external_api_token',
            'bin_id',
            'external_project_id',
            'import_api_url',
            'basic_auth_username',
            'basic_auth_password',
            'comments_private',
            'update_comments',
            'update_state',
            'base_url',
            'name',
            'active',
        ),
    );
}
