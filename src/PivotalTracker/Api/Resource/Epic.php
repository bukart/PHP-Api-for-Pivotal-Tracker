<?php

namespace PivotalTracker\Api\Resource;

use \PivotalTracker\Api;

/**
* Epic
*/
class Epic extends Api\Resource
{
    protected $_fields = array(
        'id',
        'project_id',
        'name',
        'label',
        'label_id',
        'description',
        'comments',
        'comment_ids',
        'followers',
        'follower_ids ',
        'created_at',
        'updated_at',
        'after_id ',
        'before_id ',
        'past_done_story_estimates',
        'past_done_stories_count',
        'past_done_stories_no_point_count ',
        'url',
        'kind',
    );
}
