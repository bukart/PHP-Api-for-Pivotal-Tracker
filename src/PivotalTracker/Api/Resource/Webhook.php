<?php

namespace PivotalTracker\Api\Resource;

use \PivotalTracker\Api;

/**
* Webhook
*/
class Webhook extends Api\Resource
{
    protected $_fields = array(
        'id',
        'project_id',
        'webhook_url',
        'webhook_version',
        'created_at',
        'updated_at',
        'kind',
    );
}
