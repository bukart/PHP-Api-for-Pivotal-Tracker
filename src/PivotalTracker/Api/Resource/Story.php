<?php

namespace PivotalTracker\Api\Resource;

use \PivotalTracker\Api;

/**
* Story
*/
class Story extends Api\Resource
{
    protected $_fields = array(
        'id',
        'project_id',
        'name',
        'description',
        'story_type',
        'current_state',
        'estimate',
        'accepted_at',
        'deadline',
        'requested_by',
        'requested_by_id',
        'owned_by',
        'owned_by_id',
        'owners',
        'owner_ids',
        'labels',
        'label_ids',
        'tasks',
        'task_ids',
        'followers',
        'follower_ids',
        'comments',
        'comment_ids',
        'created_at',
        'updated_at',
        'before_id',
        'after_id',
        'integration',
        'integration_id',
        'external_id',
        'url',
        'kind',
    );
}
