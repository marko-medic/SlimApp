<?php
/**
 * Created by PhpStorm.
 * User: i5
 * Date: 8/26/2019
 * Time: 1:57 PM
 */

class AppServices
{
    public $connectionString = "mysql:host=".DbConfig::DBHOST.";dbname=".DbConfig::DBNAME;

    public function getCustomerService() {
        return new CustomerService(new CustomerDAL($this->getDbService()));
    }

    private function getDbService() {
        return new DbService(new DbConnectionService($this->connectionString));
    }
}