<?php

namespace PivotalTracker\Api\Endpoint;

use PivotalTracker\Api;

/**
* ProjectEpicCommentFileAttachment
*/
class ProjectEpicCommentFileAttachment extends Api\Endpoint
{
    protected $_endpoint = '/projects/{project_id}/epics/{epic_id}/comments/{comment_id}/file_attachments/{file_attachment_id}';

    protected $_returnsList = false;

    protected $_resourceType = 'file_attachment';

    protected $_canPaginate = false;

    protected $_allowedMethods = array(
        Api::HTTP_METHOD_DELETE,
    );

    protected $_allowedFields = array();

    protected $_additionalParameters = array(
        Api::HTTP_METHOD_DELETE    => array(),
    );
}
