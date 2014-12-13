<?php

namespace PivotalTracker\Api\Resource;

use \PivotalTracker\Api;

/**
* Notification
*/
class Notification extends Api\Resource
{
    protected $_fields = array(
        'id',
        'project_id',
        'performer_id',
        'message',
        'context',
        'notification_type',
        'new_attachment_count',
        'action',
        'story',
        'story_id',
        'epic',
        'epic_id',
        'created_at',
        'updated_at',
        'read_at',
        'kind',
    );
}
