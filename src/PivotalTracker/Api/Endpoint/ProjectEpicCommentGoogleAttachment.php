<?php

namespace PivotalTracker\Api\Endpoint;

use PivotalTracker\Api;

/**
* ProjectEpicCommentGoogleAttachment
*/
class ProjectEpicCommentGoogleAttachment extends Api\Endpoint
{
    protected $_endpoint = '/projects/{project_id}/epics/{epic_id}/comments/{comment_id}/google_attachments/{google_attachment_id}';

    protected $_returnsList = false;

    protected $_resourceType = 'google_attachment';

    protected $_canPaginate = false;

    protected $_allowedMethods = array(
        Api::HTTP_METHOD_DELETE,
    );

    protected $_allowedFields = array();

    protected $_additionalParameters = array(
        Api::HTTP_METHOD_DELETE    => array(),
    );
}
