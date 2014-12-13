<?php

namespace PivotalTracker\Api\Resource;

use \PivotalTracker\Api;

/**
* Person
*/
class Person extends Api\Resource
{
    protected $_fields = array(
        'id',
        'name',
        'email',
        'initials',
        'username',
        'kind',
    );
}
