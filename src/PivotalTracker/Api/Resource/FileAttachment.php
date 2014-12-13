<?php

namespace PivotalTracker\Api\Resource;

use \PivotalTracker\Api;

/**
* FileAttachment
*/
class FileAttachment extends Api\Resource
{
    protected $_fields = array(
        'id',
        'filename',
        'created_at',
        'uploader',
        'uploader_id',
        'thumbnailable',
        'height',
        'width',
        'size',
        'download_url',
        'content_type',
        'uploaded',
        'big_url',
        'thumbnail_url',
        'kind',
    );
}
