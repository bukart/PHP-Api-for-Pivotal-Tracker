<?php

namespace PivotalTracker\Api\Resource;

use \PivotalTracker\Api;

/**
* Integration
*/
class Integration extends Api\Resource
{
    protected $_fields = array(
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
        'id',
        'project_id',
        'can_import',
        'base_url',
        'is_other',
        'story_name',
        'name',
        'active',
        'created_at',
        'updated_at',
        'kind',
    );
}
