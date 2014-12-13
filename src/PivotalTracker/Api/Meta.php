<?php

namespace PivotalTracker\Api;

/**
* Meta
*/
class Meta implements \ArrayAccess
{
    protected $_data = array();



    public function __construct($data = null)
    {
        if (!is_null($data)) {
            $this->fetch($data);
        }
    }



    public function fetch($data)
    {
        $headers = preg_split('/\R+/', $data);

        $data = array();
        foreach ($headers as $header) {
            if (preg_match('/^X-Tracker-(?P<header>[^:]+): (?P<value>.*)$/', $header, $match)) {
                $field = preg_replace('/\W+/', '_', strtolower($match['header']));
                $data[$field] = $match['value'];
            }
        }

        $this->setData($data);

        return $this;
    }



    public function clearData()
    {
        $this->_data = array();

        return $this;
    }



    public function getData($fields = null)
    {
        if (is_null($fields)) {
            return $this->_data;
        }

        if ($isString = is_string($fields)) {
            $fields = array($fields);
        }

        $data = array_intersect_key($this->_data, array_flip($fields));

        if ($isString) {
            $data = reset($data);
        }

        return $data;
    }



    public function setData($field, $value = null)
    {
        if (is_string($field)) {
            $this->_data[$field] = $value;
        } elseif (is_array($field)) {
            $this->_data = $field;
        } elseif (is_object($field) && $field instanceof \stdClass) {
            $this->_data = get_object_vars($field);
        } else {
            throw new \Exception(sprintf(
                'Cannot set variables of type %s as data, only string, stdClass and array are allowed.',
                gettype($field)
            ));
        }

        return $this;
    }



    public function addData($field, $value = null)
    {
        if (is_string($field)) {
            $data = array($field => $value);
        } elseif (is_array($field)) {
            $data = $field;
        } else {
            throw new \Exception(sprintf(
                'Cannot add content of variables of type %s as data, only string and array are allowed.',
                gettype($field)
            ));
        }

        $this->_data = array_merge($this->_data, $data);

        return $this;
    }



    public function hasData($field)
    {
        return array_key_exists($field, $this->_data);
    }



    public function unsData($field)
    {
        if (is_string($field)) {
            if ($this->hasData($field)) {
                unset($this->_data[$field]);
            }
        }

        if (is_array($field)) {
            foreach ($field as $f) {
                $this->unsData($f);
            }
        }

        return $this;
    }



    public function __call($function, $params)
    {
        if (preg_match('/^(?P<method>get|set|has|uns)(?P<field>\w+)$/', $function, $m)) {
            $method = $m['method'];
            $field = strtolower(preg_replace('/(?<=[^A-Z_])_*([A-Z])/', '_\1', $m['field']));

            switch ($method) {
                case 'get':
                    return $this->getData($field);
                    break;

                case 'set':
                    return call_user_method_array('setData', $this, array_merge(array($field), $params));
                    break;

                case 'has':
                    return $this->hasData($field);
                    break;

                case 'uns':
                    return $this->unsData($field);
                    break;
            }
        }

        $trace = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 1);

        trigger_error(sprintf(
            'Call to undefined method %s::%s() called in %s on line %d',
            __CLASS__,
            $function,
            $trace[0]['file'],
            $trace[0]['line']
        ), E_USER_ERROR);
    }



    public function offsetSet($offset, $value)
    {
        return $this->setData($offset, $value);
    }



    public function offsetExists($offset)
    {
        return $this->hasData($offset);
    }



    public function offsetUnset($offset)
    {
        return $this->unsData($offset);
    }



    public function offsetGet($offset)
    {
        return $this->getData($offset);
    }



    public function getPagination()
    {
        $data = array(
            'total'     => $this->getPaginationTotal(),
            'offset'    => $this->getPaginationOffset(),
            'limit'     => $this->getPaginationLimit(),
            'returned'  => $this->getPaginationReturned(),
        );

        $pagination = new static();
        $pagination->setData($data);

        return $pagination;
    }
}
