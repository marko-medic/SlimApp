<?php
/**
 * Created by PhpStorm.
 * User: i5
 * Date: 8/26/2019
 * Time: 1:36 PM
 */

class CustomerDAL
{
    private $_dbService;
	
    public function __construct(DbService $dbService)
    {
        if (empty($dbService)) {
            throw new InvalidArgumentException("DbServices cannot be empty");
        }
        $this->_dbService = $dbService;
    }

    public function get()
    {
        $sql = "SELECT * FROM Customers";
        $this->_dbService->query($sql);
        return $this->_dbService->getAllRows();
    }

    public function find($id)
    {
        $sql = "SELECT * FROM Customers WHERE Id = :id";
        $this->_dbService->query($sql);
        $this->_dbService->bind(":id", $id);
        return $this->_dbService->getSingleRow();
    }

    public function update(Customer $customer)
    {
        $sql = "UPDATE Customers SET FirstName=:firstName, LastName=:lastName, Phone=:phone, Email=:email, City=:city, State=:state, Address=:address WHERE Id=:id";
        $this->_dbService->query($sql);
        $this->_dbService->bind(":firstName", $customer->firstName);
        $this->_dbService->bind(":lastName", $customer->lastName);
        $this->_dbService->bind(":phone", $customer->phone);
        $this->_dbService->bind(":email", $customer->email);
        $this->_dbService->bind(":city", $customer->city);
        $this->_dbService->bind(":state", $customer->state);
        $this->_dbService->bind(":address", $customer->address);
        $this->_dbService->bind(":id", $customer->id);
        $this->_dbService->execute();
    }

    public function create(Customer $customer)
    {
        $sql = "INSERT INTO Customers (FirstName, LastName, Phone, Email, City, State, Address) VALUES (:firstName, :lastName, :phone, :email, :city, :state, :address)";
        $this->_dbService->query($sql);
        $this->_dbService->bind(":firstName", $customer->firstName);
        $this->_dbService->bind(":lastName", $customer->lastName);
        $this->_dbService->bind(":phone", $customer->phone);
        $this->_dbService->bind(":email", $customer->email);
        $this->_dbService->bind(":city", $customer->city);
        $this->_dbService->bind(":state", $customer->state);
        $this->_dbService->bind(":address", $customer->address);
        $this->_dbService->execute();
    }

    public function remove($id)
    {
        $sql = "DELETE FROM Customers WHERE Id=:id";
        $this->_dbService->query($sql);
        $this->_dbService->bind(":id", $id);
        return $this->_dbService->getRowCount() > 0;
    }
}