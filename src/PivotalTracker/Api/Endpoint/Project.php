<?php

namespace PivotalTracker\Api\Endpoint;

use PivotalTracker\Api;

/**
* Project
*/
class Project extends Api\Endpoint
{
    protected $_endpoint = '/projects/{project_id}';

    protected $_returnsList = false;

    protected $_resourceType = 'project';

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
            'name',
            'iteration_length',
            'week_start_day',
            'point_scale',
            'bugs_and_chores_are_estimatable',
            'automatic_planning',
            'enable_tasks',
            'start_date',
            'time_zone',
            'velocity_averaged_over',
            'number_of_done_iterations_to_show',
            'description',
            'profile_content',
            'enable_incoming_emails',
            'initial_velocity',
            'public',
            'atom_enabled',
            'account_id',
            'featured',
        ),
        Api::HTTP_METHOD_DELETE => array(),
    );
}
