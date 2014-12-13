<?php

namespace PivotalTracker\Api\Resource;

use \PivotalTracker\Api;

/**
* GoogleAttachment
*/
class GoogleAttachment extends Api\Resource
{
    protected $_fields = array(
        'id',
        'comment_id',
        'person',
        'person_id',
        'google_kind',
        'title',
        'google_id',
        'alternate_link',
        'resource_id',
        'kind',
    );
}
