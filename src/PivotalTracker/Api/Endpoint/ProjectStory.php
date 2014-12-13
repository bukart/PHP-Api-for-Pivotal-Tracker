<?php

namespace PivotalTracker\Api\Endpoint;

use PivotalTracker\Api;

/**
* ProjectStory
*/
class ProjectStory extends Api\Endpoint
{
    protected $_endpoint = '/projects/{project_id}/stories/{story_id}';

    protected $_returnsList = false;

    protected $_resourceType = 'story';

    protected $_canPaginate = false;

    protected $_allowedMethods = array(
        Api::HTTP_METHOD_GET,
        Api::HTTP_METHOD_PUT,
        Api::HTTP_METHOD_DELETE,
    );

    protected $_allowedFields = array();

    protected $_additionalParameters = array(
        Api::HTTP_METHOD_GET    => array(),
        Api::HTTP_METHOD_PUT    => array(
            'comment',
            'follower_ids',
            'group',
            'project_id',
            'name',
            'description',
            'story_type',
            'current_state',
            'estimate',
            'accepted_at',
            'deadline',
            'requested_by_id',
            'owned_by_id ',
            'owner_ids',
            'labels',
            'label_ids',
            'before_id',
            'after_id',
            'integration_id',
            'external_id',
            'cl_numbers',
        ),
        Api::HTTP_METHOD_DELETE,
    );
}
