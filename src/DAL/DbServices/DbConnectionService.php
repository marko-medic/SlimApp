<?php
/**
 * Created by PhpStorm.
 * User: i5
 * Date: 8/10/2019
 * Time: 4:32 PM
 */

class DbConnectionService
{
    private $_connectionString;

    public function __construct($connectionString)
    {
        if (empty($connectionString)) {
            throw new \InvalidArgumentException("Connection string cannot be null or empty string");
        }
        $this->_connectionString = $connectionString;
    }

    public function getConnectionString()
    {
        return $this->_connectionString;
    }
}