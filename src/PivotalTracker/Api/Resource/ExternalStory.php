<?php

namespace PivotalTracker\Api\Resource;

use \PivotalTracker\Api;

/**
* ExternalStory
*/
class ExternalStory extends Api\Resource
{
    protected $_fields = array(
        'name',
        'description',
        'integration',
        'integration_id',
        'external_id',
        'estimate',
        'state',
        'created_at',
        'external_requester',
        'external_owner',
        'requested_by',
        'requested_by_id',
        'owned_by',
        'owned_by_id',
        'owners',
        'owner_ids',
        'story_type',
        'extra',
        'kind',
    );
}
