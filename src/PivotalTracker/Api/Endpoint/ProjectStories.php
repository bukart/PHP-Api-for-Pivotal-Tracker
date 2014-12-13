<?php

namespace PivotalTracker\Api\Endpoint;

use PivotalTracker\Api;

/**
* ProjectStories
*/
class ProjectStories extends Api\Endpoint
{
    protected $_endpoint = '/projects/{project_id}/stories';

    protected $_returnsList = true;

    protected $_resourceType = 'story';

    protected $_canPaginate = true;

    protected $_allowedMethods = array(
        Api::HTTP_METHOD_GET,
        Api::HTTP_METHOD_POST,
    );

    protected $_allowedFields = array();

    protected $_additionalParameters = array(
        Api::HTTP_METHOD_GET    => array(
            'with_label',
            'with_state',
            'after_story_id',
            'before_story_id',
            'accepted_before',
            'accepted_after',
            'created_before',
            'created_after',
            'updated_before',
            'updated_after',
            'deadline_before',
            'deadline_after',
            'filter',
        ),
        Api::HTTP_METHOD_POST    => array(
            'description',
            'story_type',
            'current_state',
            'estimate',
            'accepted_at',
            'deadline',
            'requested_by_id',
            'owned_by_id',
            'owner_ids',
            'labels',
            'label_ids',
            'tasks',
            'follower_ids',
            'comments',
            'created_at',
            'before_id',
            'after_id',
            'integration_id',
            'external_id',
            'cl_numbers',
        ),
    );
}
