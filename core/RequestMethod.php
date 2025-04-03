<?php
/**
 * @copyright 2025 Denys Kozachok
 * @license GPL-3.0
 * @license MIT
 */


namespace core;

class RequestMethod
{
    public $array;
    public function __construct($array)
    {
        $this->array = $array;
    }
    public function __get($name)
    {
        if(isset($this->array[$name]))
        return $this->array[$name];
    }
    public function set($name,$value)
    {
        if(isset($this->array[$name]))
        $this->array[$name] = $value;
    }
    public function getAll(){
        return $this->array;
    }
}

?>