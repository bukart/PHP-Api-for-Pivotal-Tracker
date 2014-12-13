<?php

namespace PivotalTracker\Api\Endpoint;

use PivotalTracker\Api;

/**
* AccountMembership
*/
class AccountMembership extends Api\Endpoint
{
    protected $_endpoint = '/accounts/{account_id}/memberships/{person_id}';

    protected $_returnsList = false;

    protected $_resourceType = 'account_membership';

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
            'admin',
            'project_creator',
            'timekeeper',
            'time_enterer',
        ),
        Api::HTTP_METHOD_GET    => array(),
    );
}
