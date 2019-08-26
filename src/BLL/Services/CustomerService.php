<?php
/**
 * Created by PhpStorm.
 * User: i5
 * Date: 8/26/2019
 * Time: 1:39 PM
 */

class CustomerService
{
    private $_customerDAL;
    public function __construct(CustomerDAL $customerDAL)
    {
        if (empty($customerDAL)) {
            throw new InvalidArgumentException("Repositories cannot be empty");
        }
        $this->_customerDAL = $customerDAL;
    }

    public function get()
    {
        return $this->_customerDAL->get();
    }

    public function remove($id)
    {
        $this->validateId($id);
        return $this->_customerDAL->remove($id);
    }

    public function find($id)
    {
        $this->validateId($id);
        $customer = $this->_customerDAL->find($id);
        return $customer;
    }

    public function create($customer)
    {
        $this->validateCustomer($customer);
        $this->_customerDAL->create($customer);
    }

    public function update($customer)
    {
        $this->validateCustomer($customer);
        $this->validateId($customer->id);
        $this->_customerDAL->update($customer);
    }

    private function validateId($id)
    {
        if (empty($id) || $id <= 0) {
            throw new \InvalidArgumentException("Id cannot be empty or less than zero");
        }
    }

    private function validateCustomer($customer) {
        if (empty($customer)) {
            throw new \InvalidArgumentException("Customer cannot be empty");
        }

    }
}