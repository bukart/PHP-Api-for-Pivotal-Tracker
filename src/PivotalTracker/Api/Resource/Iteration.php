<?php

namespace PivotalTracker\Api\Resource;

use \PivotalTracker\Api;

/**
* Iteration
*/
class Iteration extends Api\Resource
{
    protected $_fields = array(
        'number',
        'project_id',
        'length',
        'team_strength',
        'stories',
        'story_ids',
        'start',
        'finish',
        'kind',
    );
}
