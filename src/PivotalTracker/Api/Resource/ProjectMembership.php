<?php

namespace PivotalTracker\Api\Resource;

use \PivotalTracker\Api;

/**
* ProjectMembership
*/
class ProjectMembership extends Api\Resource
{
    protected $_fields = array(
        'id',
        'person',
        'person_id',
        'project_id',
        'role',
        'project_color',
        'last_viewed_at',
        'wants_comment_notification_emails',
        'will_receive_mention_notifications_or_emails',
        'kind',
    );
}
