<?php
namespace app\businessLogic\implementation;

use yii\base\Exception;
use yii\base\Object;
use app\businessLogic\contracts\EmployeeManagerInterface;
use app\businessLogic\contracts\Employee;
use app\dataAccess\entities\EmployeeEntity;

class EmployeeManager extends Object implements EmployeeManagerInterface {
    function getById($id) {
        /** @var EmployeeEntity $employee */
        $employee = EmployeeEntity::findOne((int)$id);
        return ($employee != null) ? self::mapEntityToContract($employee) : null;
    }
    
    function getAll($limit = 100) {
        $employeeData = EmployeeEntity::find()->all();

        /** @var EmployeeEntity $item */
        foreach($employeeData as $item) {
            $res = $this->mapEntityToContract($item);
            yield $res;
        }
        //throw new \Exception("Not implemented!");
    }
    
    function create(Employee $employee) {
        $transaction = EmployeeEntity::getDb()->beginTransaction();
        try {
            $employeeEntity = self::mapContractToEntity($employee);
            $employeeEntity->save();
            $transaction->commit();
        } catch(\Exception $e) {
            $transaction->rollBack();
            throw $e;
        }
    }
    
    function update(Employee $employee) {
        /** @var EmployeeEntity $employee */
        $employeeEntity = EmployeeEntity::findOne($employee->id);

        if ($employeeEntity == null) {
            throw new Exception("Cannot update Employee. Not found.");
        }

        $transaction = EmployeeEntity::getDb()->beginTransaction();
        try {
            $employeeEntity->name = $employee->name;
            $employeeEntity->save();
            $transaction->commit();
        } catch(\Exception $e) {
            $transaction->rollBack();
            throw $e;
        }
    }
    
    function delete($id) {
        $employee = EmployeeEntity::findOne((int)$id);
        /** @var EmployeeEntity $employee */
        if ($employee != null) {
            $employee->delete();
        }
    }
    
    private function mapEntityToContract(EmployeeEntity $entity) {
        $contract = new Employee();
        $contract->id = $entity->id;
        $contract->name = $entity->name;
        $contract->age = $entity->age;
        $contract->gender = $entity->gender;
        $contract->rate = $entity->rate;
        $contract->email = $entity->email;
        return $contract;
    }
    private function mapContractToEntity(Employee $contract) {
        $entity = new EmployeeEntity();
        $entity->id = $contract->id;
        $entity->name = $contract->name;
        $entity->age = $contract->age;
        $entity->gender = $contract->gender;
        $entity->rate = $contract->rate;
        $entity->email = $contract->email;
        return $entity;
    }
}