<?php
/**
 * Created by PhpStorm.
 * User: i5
 * Date: 8/26/2019
 * Time: 1:57 PM
 */

require "../src/config/DbConfig.php";
require "../src/DAL/DbService/DbConnectionService.php";
require "../src/DAL/DbService/DbService.php";
require "../src/DAL/Repositories/CustomerDAL.php";
require "../src/BLL/Service/CustomerService.php";
require "../src/Shared/Models/Customer.php";

class AppServices
{
    public $connectionString = "mysql:host=".DbConfig::dbHost.";dbname=".DbConfig::dbName;

    public function getCustomerService() {
        return new CustomerService(new CustomerDAL($this->getDbService()));
    }

    private function getDbService() {
        return new DbService(new DbConnectionService($this->connectionString));
    }
}