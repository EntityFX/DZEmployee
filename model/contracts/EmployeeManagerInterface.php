<?php
namespace application\model\contracts;

interface EmployeeManagerInterface {
    function getById($id);

    function getAll($limit = 100);

    function create(Employee $employee);

    function update(Employee $employee);

    function delete($id);
}