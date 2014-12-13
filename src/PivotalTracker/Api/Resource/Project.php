<?php

namespace PivotalTracker\Api\Resource;

use \PivotalTracker\Api;

/**
* Project
*/
class Project extends Api\Resource
{
    protected $_fields = array(
        'id',
        'name',
        'version',
        'iteration_length',
        'week_start_day',
        'point_scale',
        'point_scale_is_custom',
        'bugs_and_chores_are_estimatable',
        'automatic_planning',
        'enable_following',
        'enable_tasks',
        'start_date',
        'time_zone',
        'velocity_averaged_over',
        'shown_iterations_start_time',
        'start_time',
        'number_of_done_iterations_to_show',
        'has_google_domain',
        'description',
        'profile_content',
        'enable_incoming_emails',
        'initial_velocity',
        'public',
        'atom_enabled',
        'current_iteration_number',
        'current_velocity',
        'current_volatility',
        'account_id',
        'accounting_type',
        'featured',
        'stories',
        'story_ids',
        'epics',
        'epic_ids',
        'memberships',
        'membership_ids',
        'labels',
        'label_ids',
        'integrations',
        'integration_ids',
        'iteration_override_numbers',
        'created_at',
        'updated_at',
        'kind',
    );
}
