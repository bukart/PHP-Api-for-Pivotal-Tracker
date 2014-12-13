<?php

namespace PivotalTracker\Api\Endpoint;

use PivotalTracker\Api;

/**
* ProjectEpics
*/
class ProjectEpics extends Api\Endpoint
{
    protected $_endpoint = '/projects/{project_id}/epics';

    protected $_returnsList = true;

    protected $_resourceType = 'epic';

    protected $_canPaginate = false;

    protected $_allowedMethods = array(
        Api::HTTP_METHOD_GET,
        Api::HTTP_METHOD_POST,
    );

    protected $_allowedFields = array();

    protected $_additionalParameters = array(
        Api::HTTP_METHOD_GET    => array(
            'filter',
        ),
        Api::HTTP_METHOD_POST   => array(
            'name',
            'label',
            'label_id',
            'description',
            'comments',
            'followers',
            'follower_ids',
            'after_id',
            'before_id',
        ),
    );
}
