<?php

namespace PivotalTracker\Api\Resource;

use \PivotalTracker\Api;

/**
* SourceCommit
*/
class SourceCommit extends Api\Resource
{
    protected $_fields = array(
        'commit_id',
        'message',
        'url',
        'author',
        'kind',
    );
}
