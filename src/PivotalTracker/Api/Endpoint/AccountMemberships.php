<?php

namespace PivotalTracker\Api\Endpoint;

use PivotalTracker\Api;

/**
* AccountMemberships
*/
class AccountMemberships extends Api\Endpoint
{
    protected $_endpoint = '/accounts/{account_id}/memberships';

    protected $_returnsList = true;

    protected $_resourceType = 'account_membership';

    protected $_canPaginate = false;

    protected $_allowedMethods = array(
        Api::HTTP_METHOD_GET,
        Api::HTTP_METHOD_POST,
    );

    protected $_allowedFields = array();

    protected $_additionalParameters = array(
        Api::HTTP_METHOD_GET    => array(),
        Api::HTTP_METHOD_POST    => array(
            'person_id',
            'email',
            'name',
            'initials',
            'created_at',
            'admin',
            'project_creator',
            'timekeeper',
            'time_enterer',
        ),
    );
}
