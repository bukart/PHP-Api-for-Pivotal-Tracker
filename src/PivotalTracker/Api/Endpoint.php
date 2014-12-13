<?php

namespace PivotalTracker\Api;

use \PivotalTracker\Api;

/**
* Endpoint
*/
class Endpoint
{
    const
        FIELDS_DEFAULTSELECTOR      = ':default',
        FIELDS_SEPARATOR            = ',';



    protected $_endpoint = null;

    protected $_baseUrl = 'https://www.pivotaltracker.com/services/v5';

    protected $_params = null;

    protected $_returnsList = false;

    protected $_resourceType = '';

    protected $_canPaginate = false;

    protected $_allowedMethods = array(
        Api::HTTP_METHOD_GET,
    );

    protected $_allowedFields = array();

    protected $_additionalParameters = array(
        Api::HTTP_METHOD_GET    => array(),
    );

    protected $_fields = array(
        self::FIELDS_DEFAULTSELECTOR,
    );

    protected $_dateFormat = false;

    protected static $_resourceSingletons = array();



    public static function create($type = null)
    {
        if (is_null($type)) {
            return new static();
        }

        $class = __CLASS__ . '\\' . str_replace(' ', '', ucwords(str_replace('_', ' ', $type)));

        return new $class();
    }



    protected function _extractParams()
    {
        preg_match_all('/\{(?P<params>\w+)\}/', $this->getEndpoint(), $matches);
        $params = $matches['params'];

        if (!is_null($this->getParams())) {
            $paramNames = $this->getParamNames();
        } else {
            $this->_params = array();
            $paramNames = array();
        }

        $existingParams = array_intersect($params, $paramNames);
        $missingParams = array_diff($params, $paramNames);
        $obsoleteParams = array_diff($paramNames, $params);

        foreach ($missingParams as $param) {
            $this->_params[$param] = null;
        }
        foreach ($obsoleteParams as $param) {
            unset($this->_params[$param]);
        }

        return $this;
    }



    public function getParams($param = null)
    {
        if (is_null($param)) {
            return $this->_params;
        }

        if (is_string($param) && array_key_exists($param, $this->_params)) {
            return $this->_params[$param];
        }

        if (is_array($param)) {
            return array_intersect_key($this->_params, array_flip($param));
        }

        return null;
    }



    public function getParamNames()
    {
        if (is_null($this->getParams())) {
            $this->_extractParams();
        }
        return array_keys($this->getParams());
    }



    public function setParam($param, $value = null)
    {
        if (is_null($this->getParams())) {
            $this->_extractParams();
        }

        if (!is_array($param)) {
            if (!array_key_exists($param, $this->_params)) {
                Api::newException('Cannot set value for unkown endpoint param "%s".', $param)->throwMe();
            }

            $this->_params[$param] = $value;
        } else {
            foreach ($param as $p => $value) {
                $this->setParam($p, $value);
            }
        }

        return $this;
    }



    public function setEndpoint($endpoint)
    {
        $this->_enpoint = $endpoint;
        return $this->_extractParams();
    }



    public function getEndpoint($withParams = false)
    {
        if (!$withParams) {
            return $this->_endpoint;
        }

        if (true === $withParams) {
            $withParams = $this->getParams();
        }

        if (is_null($this->getParams())) {
            $this->_extractParams();
        }

        $missingParams = array();
        $params = array();
        foreach ($this->getParams() as $param => $value) {
            if (is_null($value)) {
                $missingParams[] = $param;
                continue;
            }
            $placeHolder = sprintf('{%s}', $param);
            $params[$placeHolder] = $value;
        }

        if (count($missingParams)) {
            Api::newException(
                'Cannot prepare endpoint "%s", missing param(s): %s',
                $endpoint,
                implode(', ', $missingParams)
            )->throwMe();
        }

        return str_replace(array_keys($params), $params, $this->_endpoint);
    }



    public function setBaseUrl($baseUrl)
    {
        $this->_baseUrl = $baseUrl;
        return $this;
    }



    public function getBaseUrl()
    {
        return $this->_baseUrl;
    }



    public function getUrl($params = null)
    {
        $url = sprintf('%s/%s', $this->getBaseUrl(), trim($this->getEndpoint(true), '/'));

        if (is_array($params)) {
            $urlParts = parse_url($url);
            $urlQry = parse_url($url, PHP_URL_QUERY);

            if (array_key_exists('scheme', $urlParts)) {
                $urlParts['scheme'] .= '://';
            }

            if ($urlQry = ($urlQry ? $urlQry . '&' : '') . http_build_query($params)) {
                $urlParts['query'] = '?' . $urlQry;
            }

            $url = implode('', $urlParts);
        }

        return $url;
    }



    public function getAllowedMethods()
    {
        return $this->_allowedMethods;
    }



    public function isAllowed($method)
    {
        return in_array(strtoupper($method), $this->getAllowedMethods());
    }



    public function returnsList($returnsList = null)
    {
        if (is_null($returnsList)) {
            return $this->_returnsList;
        }

        $this->_returnsList = $returnsList;

        return $this;
    }



    public function getResourceType()
    {
        return $this->_resourceType;
    }



    public function setResourceType($resourceType)
    {
        $this->_resourceType = $resourceType;

        return $this;
    }



    public function canPaginate($canPaginate = null)
    {
        if (is_null($canPaginate)) {
            return $this->_canPaginate;
        }

        $this->_canPaginate = $canPaginate;

        return $this;
    }



    public function setAdditionalParameters($method, $parameters)
    {
        if (!$this->isAllowed($method)) {
            Api::newException('Cannot set additional parameters for not allowed HTTP method "%s"', $method)->throwMe();
        }

        if (!is_array($parameters)) {
            Api::newException('Cannot set additional parameters, parameters must be an array instead of %s', gettype($parameters))->throwMe();
        }

        $method = strtoupper($method);

        $this->_additionalParameters[$method] = array_values($parameters);

        return $this;
    }



    public function setAdditionalGetParameters($parameters)
    {
        return $this->setAdditionalParameters(Api::HTTP_METHOD_GET, $parameters);
    }



    public function getAdditionalParameters($method = null)
    {
        if (is_null($method)) {
            return $this->_additionalParameters;
        }

        $method = strtoupper($method);
        if (array_key_exists($method, $this->_additionalParameters)) {
            return $this->_additionalParameters[$method];
        }

        return array();
    }



    public function addAdditionalParameters($method, $parameters)
    {
        if (!is_array($parameters)) {
            $parameters = array($parameters);
        }

        $parameters = array_values(array_unique(array_merge($this->getAdditionalParameters($method), $parameters)));
        $this->setAdditionalParameters($method, $parameters);

        return $this;
    }



    public function removeAdditionalParameters($method, $parameters)
    {
        if (!is_array($parameters)) {
            $parameters = array($parameters);
        }

        $parameters = array_values(array_diff($this->getAdditionalParameters($method), array_values(array_unique($parameters))));
        $this->setAdditionalParameters($method, $parameters);

        return $this;
    }



    public function hasAdditionalParameter($method, $parameter)
    {
        $method = strtoupper($method);

        return in_array($parameters, $this->getAdditionalParameters($method));
    }



    public function setAllowedFields($fields)
    {
        $this->_allowedFields = array_values(array_unique($fields));

        return $this;
    }



    public function getAllowedFields()
    {
        return array_values(array_unique(array_merge($this->getResourceSingleton()->getFields(), $this->_allowedFields)));
    }



    public function addAllowedFields($fields)
    {
        if (!is_array($fields)) {
            $fields = array($fields);
        }

        $this->setAllowedFields(array_merge($this->getAllowedFields(), $fields));

        return $this;
    }



    public function removeAllowedFields($fields)
    {
        if (!is_array($fields)) {
            $fields = array($fields);
        }

        $this->setAllowedFields(array_diff($this->getAllowedFields(), $fields));

        return $this;
    }



    public function hasAllowedField($field)
    {
        return in_array($field, $this->getAllowedFields());
    }



    public function findAllowedFields($fields)
    {
        if (!is_array($fields)) {
            $fields = array($fields);
        }

        $fields = array_values(array_unique($fields));

        return array_intersect($fields, $this->getAllowedFields());
    }



    public function resetFields()
    {
        $this->_fields = array(
            static::FIELDS_DEFAULTSELECTOR,
        );

        return $this;
    }



    public function setFields($fields)
    {
        if (!is_array($fields)) {
            $fields = array($fields);
        }

        $hadDefault = false;
        if (false !== ($key = array_search(static::FIELDS_DEFAULTSELECTOR, $fields))) {
            $hadDefault = true;
            unset($fields[$key]);
            $fields = array_values($fields);
        }

        $allowed = $this->findAllowedFields($fields);

        if ($allowed != $fields) {
            $unallowed = array_values(array_diff($fields, $allowed));
            Api::newException('Cannot set not allowed field(s) [%s]', implode($unallowed))->throwMe();
        }

        if ($hadDefault) {
            array_push($fields, static::FIELDS_DEFAULTSELECTOR);
        }

        $this->_fields = array_values(array_unique($fields));

        return $this;
    }



    public function getFields()
    {
        return $this->_fields;
    }



    public function addFields($fields)
    {
        if (!is_array($fields)) {
            $fields = array($fields);
        }

        $hadDefault = false;
        if (false !== ($key = array_search(static::FIELDS_DEFAULTSELECTOR, $fields))) {
            $hadDefault = true;
            unset($fields[$key]);
            $fields = array_values($fields);
        }

        $allowed = $this->findAllowedFields($fields);

        if ($allowed != $fields) {
            $unallowed = array_values(array_diff($fields, $allowed));
            Api::newException('Cannot add not allowed field(s) [%s]', implode($unallowed))->throwMe();
        }

        if ($hadDefault) {
            array_push($fields, static::FIELDS_DEFAULTSELECTOR);
        }

        $this->setFields(array_merge($this->getFields(), $fields));

        return $this;
    }



    public function removeFields($fields)
    {
        if (!is_array($fields)) {
            $fields = array($fields);
        }

        $this->setFields(array_diff($this->getFields(), $fields));

        return $this;
    }



    public function addAllFields()
    {
        $this->resetFields()->addFields($this->getAllowedFields());

        return $this;
    }



    public function clearFields()
    {
        $this->_fields = array();

        return $this;
    }



    public function getFieldsString()
    {
        if (!count($this->getFields())) {
            return false;
        }

        return implode(static::FIELDS_SEPARATOR, $this->getFields());
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



    public function getResourceSingleton($type = null)
    {
        if (is_null($type)) {
            $type = $this->getResourceType();
        }

        $type = strtolower($type);

        if (!array_key_exists($type, static::$_resourceSingletons)) {
            static::$_resourceSingletons[$type] = Api\Resource::create($type);
        }

        return static::$_resourceSingletons[$type];
    }
}
