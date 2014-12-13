<?php

namespace PivotalTracker\Api;

use \PivotalTracker\Api;

/**
* Response
*/
class Response
{
    protected $_api = null;

    protected $_endpoint = null;

    protected $_data = null;

    protected $_headerSize = null;

    protected $_header = null;

    protected $_body = null;

    protected $_code = null;

    protected $_decoded = null;

    protected $_errorCallback = null;

    protected $_meta = null;

    protected $_lastHeaders = array();

    protected $_locked = false;

    protected $_evaluating = false;

    protected $_httpCodes = array(
        100     => 'Continue',
        101     => 'Switching Protocols',
        102     => 'Processing',

        200     => 'OK',
        201     => 'Created',
        202     => 'Accepted',
        203     => 'Non-Authoritative Information',
        204     => 'No Content',
        205     => 'Reset Content',
        206     => 'Partial Content',
        207     => 'Multi-Status',
        208     => 'Already Reported',
        226     => 'IM Used',

        300     => 'Multiple Choices',
        301     => 'Moved Permanently',
        302     => 'Found',
        303     => 'See Other',
        304     => 'Not Modified',
        305     => 'Use Proxy',
        306     => 'Switch Proxy',
        307     => 'Temporary Redirect',
        308     => 'Permanent Redirect',

        400     => 'Bad Request',
        401     => 'Unauthorized',
        402     => 'Payment Required',
        403     => 'Forbidden',
        404     => 'Not Found',
        405     => 'Method Not Allowed',
        406     => 'Not Acceptable',
        407     => 'Proxy Authentication Required',
        408     => 'Request Time-out',
        409     => 'Conflict',
        410     => 'Gone',
        411     => 'Length Required',
        412     => 'Precondition Failed',
        413     => 'Request Entity Too Large',
        414     => 'Request-URL Too Long',
        415     => 'Unsupported Media Type',
        416     => 'Requested range not satisfiable',
        417     => 'Expectation Failed',
        418     => 'I’m a teapot',
        420     => 'Policy Not Fulfilled',
        421     => 'There are too many connections from your internet address',
        422     => 'Unprocessable Entity',
        423     => 'Locked',
        424     => 'Failed Dependency',
        425     => 'Unordered Collection',
        426     => 'Upgrade Required',
        428     => 'Precondition Required',
        429     => 'Too Many Requests',
        431     => 'Request Header Fields Too Large',

        500     => 'Internal Server Error',
        501     => 'Not Implemented',
        502     => 'Bad Gateway',
        503     => 'Service Unavailable',
        504     => 'Gateway Time-out',
        505     => 'HTTP Version not supported',
        506     => 'Variant Also Negotiates',
        507     => 'Insufficient Storage',
        508     => 'Loop Detected',
        509     => 'Bandwidth Limit Exceeded',
        510     => 'Not Extended',
    );



    public function __construct($api)
    {
        $this->_api = $api;
    }



    public function getApi()
    {
        return $this->_api();
    }



    public function lock()
    {
        if (!$this->isLocked()) {
            $this->_locked = true;

            $this->_evaluate();
        }

        return $this;
    }



    public function isLocked()
    {
        return $this->_locked;
    }



    public function isEvaluating()
    {
        return $this->_evaluating;
    }



    public function setEndpoint($endpoint)
    {
        if (!$this->isLocked()) {
            $this->_endpoint = $endpoint;
        }

        return $this;
    }



    public function getEndpoint()
    {
        return $this->_endpoint;
    }



    public function setData($data)
    {
        if (!$this->isLocked()) {
            $this->_data = $data;
        }

        return $this;
    }



    public function getData()
    {
        return $this->_data;
    }



    public function setCode($code)
    {
        if (!$this->isLocked()) {
            $this->_code = $code;
        }

        return $this;
    }



    public function getCode()
    {
        return $this->_code;
    }



    public function setHeaderSize($headerSize)
    {
        if (!$this->isLocked()) {
            $this->_headerSize = $headerSize;
        }

        return $this;
    }



    public function getHeaderSize()
    {
        return $this->_headerSize;
    }



    protected function _setHeader($header)
    {
        if (!$this->isLocked() || $this->isEvaluating()) {
            $this->_header = $header;
        }

        return $this;
    }



    public function getHeader()
    {
        return $this->_header;
    }



    protected function _setBody($body)
    {
        if (!$this->isLocked() || $this->isEvaluating()) {
            $this->_body = $body;
        }

        return $this;
    }



    public function getBody()
    {
        return $this->_body;
    }



    public function getDecoded()
    {
        if (is_null($this->_decoded)) {
            $this->_decode();
        }

        return $this->_decoded;
    }



    protected function _decode()
    {
        $this->lock();
        $this->_decoded = json_decode($this->getBody());

        if (is_null($this->_decoded)) {
            Api::newException('Could not decode response body')->throwMe();
        }

        return $this;
    }



    protected function _fetchMeta()
    {
        $this->_meta = new Api\Meta($this->getHeader());

        return $this;
    }



    public function getMeta()
    {
        if (is_null($this->_meta)) {
            $this->_fetchMeta();
        }

        return $this->_meta;
    }



    public function codeIndicatesError($code = null)
    {
        if (is_null($code)) {
            $code = $this->getCode();
        }

        return preg_match('/^[45]\d\d$/', $code);
    }



    public function getCodeMessage($code = null)
    {
        if (is_null($code)) {
            $code = $this->getCode();
        }

        if (array_key_exists($code, $this->_httpCodes)) {
            return $this->_httpCodes[$code];
        }

        return null;
    }



    protected function _evaluate()
    {
        $this->lock();

        $this->_evaluating = true;

        $this->_setHeader(substr($this->getData(), 0, $this->getHeaderSize()));
        $this->_setBody(substr($this->getData(), $this->getHeaderSize()));

        $this->_evaluating = false;

        return $this;
    }
}
