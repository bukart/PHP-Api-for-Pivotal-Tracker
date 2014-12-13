<?php

namespace PivotalTracker\Api\Resource;

use \PivotalTracker\Api;

/**
* Comment
*/
class Comment extends Api\Resource
{
    protected $_fields = array(
        'id',
        'story_id',
        'epic_id',
        'text',
        'person',
        'person_id',
        'created_at',
        'updated_at',
        'file_attachments',
        'file_attachment_ids ',
        'google_attachments',
        'google_attachment_ids ',
        'commit_identifier',
        'commit_type',
        'kind',
    );
}
