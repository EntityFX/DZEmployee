<?php
namespace app\dataAccess\entities;
use yii\db\ActiveRecord;

class EmployeeEntity extends ActiveRecord {
    public static function tableName()
    {
        return 'Employee';
    }
}