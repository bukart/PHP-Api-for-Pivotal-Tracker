<?php

namespace PivotalTracker\Api\Resource;

use \PivotalTracker\Api;

/**
* Error
*/
class Error extends Api\Resource
{
    protected $_fields = array(
        'kind',
        'code',
        'error',
        'requirement',
        'general_problem',
        'possible_fix',
        'validation_errors',
    );
}
