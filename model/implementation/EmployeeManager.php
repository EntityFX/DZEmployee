<?php
namespace application\model\implementation;

use application\model\contracts\Employee;
use application\model\contracts\EmployeeManagerInterface;
use PDO;
use PDOException;

class EmployeeManager implements EmployeeManagerInterface {

    const TABLE_NAME = "Employee";

    private $_dbConnection;

    function __construct(array $settings) {
        try {
            $this->_dbConnection = new PDO(
                $settings['dbConnection']['dsn'],
                $settings['dbConnection']['username'],
                $settings['dbConnection']['password']
            );
            $this->_dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->_dbConnection->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        } catch(PDOException $err) {
            throw new \Exception("Cannot connect to the database: {$err->getMessage()}");
        }
    }

    function getById($id) {
        $tbl = self::TABLE_NAME;
        $sql = $this->_dbConnection->prepare("SELECT * FROM `{$tbl}` WHERE `id` = :id");
        $sql->execute(["id" => (int)$id]);
        $result = $sql->fetch(PDO::FETCH_ASSOC);
        return !$result ? null : $this->mapEntityToContract($result);
    }

    function getAll($limit = 100) {
        $tbl = self::TABLE_NAME;
        $sql = $this->_dbConnection->prepare("SELECT * FROM `{$tbl}` LIMIT :limit");
        $sql->execute(["limit" => (int)$limit]);
        $result = $sql->fetchAll(PDO::FETCH_ASSOC);

        foreach($result as $item) {
            $res = $this->mapEntityToContract($item);
            yield $res;
        }
    }

    function create(Employee $employee) {
        $tbl = self::TABLE_NAME;
        $sql = $this->_dbConnection->prepare("INSERT INTO {$tbl} VALUES (0, :name, :age, :gender, :rate)");
        $sql->execute([
            ":name" => $employee->name,
            ":age" => $employee->age,
            ":gender" => $employee->gender,
            ":rate" => $employee->rate
        ]);
    }

    function update(Employee $employee) {
        // TODO: Implement update() method.
    }

    function delete($id) {
        $tbl = self::TABLE_NAME;
        $sql = $this->_dbConnection->prepare("DELETE FROM {$tbl} WHERE id = :id");
        $sql->execute(["id" => (int)$id]);
    }

    private function mapEntityToContract(array $entity) {
        $contract = new Employee();
        $contract->id = $entity['id'];
        $contract->name = $entity['name'];
        $contract->age = $entity['age'];
        $contract->gender = $entity['gender'];
        $contract->rate = $entity['rate'];
        return $contract;
    }
}