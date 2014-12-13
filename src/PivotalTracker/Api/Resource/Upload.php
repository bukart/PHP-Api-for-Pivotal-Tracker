<?php

namespace PivotalTracker\Api\Resource;

use \PivotalTracker\Api;

/**
* Upload
*/
class Upload extends Api\Resource
{
    protected $_fields = array(
        'comment',
        'file',
    );
}
