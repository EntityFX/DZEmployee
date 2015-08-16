<?php
namespace app\businessLogic\contracts;

interface EmployeeManagerInterface {
    function getById($id);
    function getAll($limit = 100);
    function create(Employee $employee);
    function update(Employee $employee);
    function delete($id);
}