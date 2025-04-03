<?php
/**
 * @copyright 2025 Denys Kozachok
 * @license GPL-3.0
 * @license MIT
 */

namespace core;

class Get extends RequestMethod
{
    public function __construct()
    {
        parent::__construct($_GET);
    }
}

?>