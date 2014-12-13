<?php

namespace PivotalTracker;

/**
* Api
*/
class Api
{
    const
        HTTP_METHOD_GET     = 'GET',
        HTTP_METHOD_POST    = 'POST',
        HTTP_METHOD_PUT     = 'PUT',
        HTTP_METHOD_DELETE  = 'DELETE';

    const
        DATEFORMAT_ISO8601          = 'iso8601',
        DATEFORMAT_MILLIS           = 'millis';



    protected $_token = null;

    protected $_username = null;

    protected $_password = null;

    protected $_curlHandle = null;

    protected $_requestMethod = self::HTTP_METHOD_GET;

    protected $_requestData = null;

    protected $_response = null;

    protected $_errorCallback = null;

    protected $_dateFormat = self::DATEFORMAT_ISO8601;



    public function __construct($token)
    {
        $this->setToken($token);
    }



    public function setErrorCallback($callback)
    {
        $this->_errorCallback = $callback;

        return $this;
    }



    public function getErrorCallback()
    {
        return $this->_errorCallback;
    }



    protected function _execErrorCallback()
    {
        if (!is_null($cb = $this->getErrorCallback())) {
            $cb($this);
            return true;
        }

        return false;
    }



    public function setToken($token)
    {
        $this->_token = $token;
    }



    public function getToken()
    {
        return $this->_token;
    }



    public static function newException($message, $params = array())
    {
        if (!is_array($params)) {
            if (2 == func_num_args()) {
                $params = array($params);
            } elseif (2 < func_num_args()) {
                $params = func_get_args();
                array_shift($params);
            }
        }

        if (count($params)) {
            array_unshift($params, $message);
            $message = call_user_func_array('sprintf', $params);
        }

        return new Api\Exception($message);
    }



    public function setUsername($username)
    {
        $this->_username = $username;
        return $this;
    }



    public function getUsername()
    {
        return $this->_username;
    }



    public function setPassword($password)
    {
        $this->_password = $password;
        return $this;
    }



    public function getPassword()
    {
        return $this->_password;
    }



    public function getAuth()
    {
        if (is_null($this->getUsername())) {
            return null;
        }

        return sprintf('%s:%s', $this->getUsername(), $this->getPassword());
    }



    protected function _initCurl($url)
    {
        if (!is_null($this->_curlHandle)) {
            static::newException('Cannot initialize curl, already intialized.')->throwMe();
        }

        // echo sprintf("\n\n   requesting api: %s \n\n", $url);

        $this->_curlHandle = curl_init($url);

        $this->_curl(CURLOPT_HEADER, true)
            ->_curl(CURLOPT_RETURNTRANSFER, true)
            ->_curl(CURLOPT_SSL_VERIFYPEER, false);

        $this->_authCurl();

        return $this;
    }



    protected function _finishCurl()
    {
        if (is_null($this->_curlHandle)) {
            static::newException('Cannot finish uninitialized curl.')->throwMe();
        }
        curl_close($this->_getCurlHandle());
        $this->getResponse()->lock();

        $this->_curlHandle = null;

        return $this;
    }



    protected function _authCurl()
    {
        if ($auth = $this->getAuth()) {
            $this->_curl(CURLOPT_USERPWD, $auth);
        }

        if ($token = $this->getToken()) {
            $this->_curl(CURLOPT_HTTPHEADER, array(
                sprintf('X-TrackerToken: %s', $token),
            ));
        }

        return $this;
    }



    protected function _applyCurlMethod()
    {
        if (is_null($this->getRequestMethod())) {
            static::newException('Cannot apply undefined curl method.')->throwMe();
        }

        $methods = array(
            static::HTTP_METHOD_POST    => array(CURLOPT_POST, 1),
            static::HTTP_METHOD_PUT     => array(CURLOPT_CUSTOMREQUEST, 'PUT'),
            static::HTTP_METHOD_DELETE  => array(CURLOPT_CUSTOMREQUEST, 'DELETE'),
            static::HTTP_METHOD_GET     => array(CURLOPT_HTTPGET, 1),
        );

        call_user_method_array('_curl', $this, $methods[$this->getRequestMethod()]);

        return $this;
    }



    protected function _applyCurlData()
    {
        if (is_null($this->getRequestMethod())) {
            static::newException('Cannot apply data for undefined curl method.')->throwMe();
        }

        $methods = array(
            static::HTTP_METHOD_POST,
            static::HTTP_METHOD_PUT,
            static::HTTP_METHOD_DELETE,
        );

        if (in_array($this->getRequestMethod(), $methods)) {
            $data = $this->getRequestData();
            $data = http_build_query(!is_null($data) ? $data : array());
            $contentLength = strlen($data);

            $this->_curl(CURLOPT_POSTFIELDS, $data)
                ->_curl(CURLOPT_HTTPHEADER, array(
                    sprintf('Content-Length: %d', $contentLength),
                ));
        }

        return $this;
    }



    protected function _execCurl()
    {
        if (is_null($this->_curlHandle)) {
            static::newException('Cannot exec curl. Initialize curl first.')->throwMe();
        }
        $data = curl_exec($this->_getCurlHandle());
        $this->getResponse()->setData($data);

        if (curl_errno($this->_getCurlHandle())) {
            static::newException(curl_error($this->_getCurlHandle()))->throwMe();
        }

        $code = $this->_curlInfo(CURLINFO_HTTP_CODE);
        $this->getResponse()->setCode($code);

        $headerSize = $this->_curlInfo(CURLINFO_HEADER_SIZE);
        $this->getResponse()->setHeaderSize($headerSize);

        return $this;
    }



    protected function _curl($option, $value)
    {
        if (is_null($this->_curlHandle)) {
            static::newException('Cannot set curl option. Initialize curl first.')->throwMe();
        }
        curl_setopt($this->_getCurlHandle(), $option, $value);

        return $this;
    }



    protected function _curlInfo($option)
    {
        if (is_null($this->_curlHandle)) {
            static::newException('Cannot get curl info option. Initialize curl first.')->throwMe();
        }

        return curl_getinfo($this->_getCurlHandle(), $option);
    }



    public function setRequestMethod($method)
    {
        $method = strtoupper($method);
        $methods = array(static::HTTP_METHOD_POST, static::HTTP_METHOD_PUT, static::HTTP_METHOD_DELETE, static::HTTP_METHOD_GET);
        if (!in_array($method, $methods)) {
            static::newException('Unknown method "%s" for API requests.', $method)->throwMe();
        }
        $this->_requestMethod = $method;

        return $this;
    }



    public function getRequestMethod()
    {
        return $this->_requestMethod;
    }



    public function setRequestData($data)
    {
        $this->_requestData = $data;

        return $this;
    }



    public function getRequestData()
    {
        return $this->_requestData;
    }



    protected function _getCurlHandle()
    {
        return $this->_curlHandle;
    }



    public function request($endpoint, $params = array(), $data = array(), $method = self::HTTP_METHOD_GET)
    {
        if (!array_key_exists('fields', $params)) {
            if ($fields = $endpoint->getFieldsString()) {
                $params['fields'] = $fields;
            }
        }
        if (!array_key_exists('date_format', $params)) {
            if ($dateFormat = $endpoint->getDateFormatString()) {
                $params['date_format'] = $dateFormat;
            } elseif ($dateFormat = $this->getDateFormatString()) {
                // $params['date_format'] = $dateFormat;
            }
        }

        if (!$endpoint->canPaginate()) {
            if (array_key_exists('limit', $params)) {
                unset($params['limit']);
            }
            if (array_key_exists('offset', $params)) {
                unset($params['offset']);
            }
        } else {
            if (array_key_exists('offset', $params) && $params['offset'] == 0) {
                unset($params['offset']);
            }
        }


        $this->_resetResponse()->setEndpoint($endpoint);

        $this->setRequestMethod($method)
            ->setRequestData($data);

        if (!$endpoint->isAllowed($method)) {
            static::newException('HTTP method "%s" is not allowed for given endpoint "%s" (%s)', $method, $endpoint->getEndpoint(), get_class($endpoint))->throwMe();
        }

        $this->_initCurl($endpoint->getUrl($params))
            ->_applyCurlMethod()
            ->_applyCurlData()
            ->_execCurl()
            ->_finishCurl();

        if ($this->getResponse()->codeIndicatesError()) {
            if (!$this->_execErrorCallback()) {
                static::newException(
                    'An error occurred through request, got HTTP code %s (%s)',
                    $this->getResponse()->getCode(),
                    $this->getResponse()->getCodeMessage()
                )->throwMe();
            }
        }

        return $this->getResponse()->getDecoded();
    }



    public function get($endpoint, $params = array(), $data = array())
    {
        return $this->request($endpoint, $params, $data, static::HTTP_METHOD_GET);
    }



    public function post($endpoint, $params = array(), $data = array())
    {
        return $this->request($endpoint, $params, $data, static::HTTP_METHOD_POST);
    }



    public function put($endpoint, $params = array(), $data = array())
    {
        return $this->request($endpoint, $params, $data, static::HTTP_METHOD_PUT);
    }



    public function delete($endpoint, $params = array(), $data = array())
    {
        return $this->request($endpoint, $params, $data, static::HTTP_METHOD_DELETE);
    }



    public function retrieveToken($username, $password)
    {
        $this->setUsername($username)
            ->setPassword($password);

        $data = $this->request(
            Api\Endpoint::create('me')->setFields('api_token')
        );

        if (!property_exists($data, 'api_token')) {
            static::newException('Could not retrieve token. Field "api_token" was not submitted in API response.')->throwMe();
        }

        return $data->api_token;
    }



    public function createEndpoint($type = null)
    {
        return Api\Endpoint::create($type);
    }



    protected function _resetResponse()
    {
        $this->_response = new Api\Response($this);

        return $this->_response;
    }



    public function getResponse()
    {
        if (is_null($this->_response)) {
            return $this->_resetResponse();
        }

        return $this->_response;
    }



    public function setDateFormat($dateFormat)
    {
        $this->_dateFormat = $dateFormat;

        return $this;
    }



    public function getDateFormat()
    {
        return $this->_dateFormat;
    }



    public function setDateFormatIso8601()
    {
        $this->setDateFormat(Api::DATEFORMAT_ISO8601);

        return $this;
    }



    public function setDateFormatMillis()
    {
        $this->setDateFormat(Api::DATEFORMAT_MILLIS);

        return $this;
    }



    public function isDateFormatIso8601()
    {
        return Api::DATEFORMAT_ISO8601 == $this->getDateFormat();
    }



    public function isDateFormatMillis()
    {
        return Api::DATEFORMAT_MILLIS == $this->getDateFormat();
    }



    public function getDateFormatString()
    {
        if (!$this->getDateFormat()) {
            return false;
        }

        return $this->getDateFormat();
    }
}
