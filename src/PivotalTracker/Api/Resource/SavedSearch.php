<?php

namespace PivotalTracker\Api\Resource;

use \PivotalTracker\Api;

/**
* SavedSearch
*/
class SavedSearch extends Api\Resource
{
    protected $_fields = array(
        'name',
        'query',
    );
}
