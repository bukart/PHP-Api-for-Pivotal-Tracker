<?php

namespace PivotalTracker\Api;

/**
* Exception
*/
class Exception extends \Exception
{
    public function throwMe()
    {
        throw $this;
    }
}
