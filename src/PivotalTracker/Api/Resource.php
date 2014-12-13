<?php

namespace PivotalTracker\Api;

/**
* Resource
*/
class Resource
{
    protected $_fields = array();


    public static function create($type = null)
    {
        if (is_null($type)) {
            return new static();
        }

        $class = __CLASS__ . '\\' . str_replace(' ', '', ucwords(str_replace('_', ' ', $type)));

        return new $class();
    }



    public function setFields($fields)
    {
        if (!is_array($fields)) {
            $fields = array($fields);
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



    public function clearFields()
    {
        $this->_fields = array();

        return $this;
    }
}
