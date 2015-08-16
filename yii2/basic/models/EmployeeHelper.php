<?php
/**
 * Created by PhpStorm.
 * User: entityfx
 * Date: 17.08.15
 * Time: 0:41
 */

namespace app\models;


class EmployeeHelper
{
    public static function rate(array $rates, $value) {
        return $rates[(int)$value];
    }

    public static  function genderString($value) {
        return (bool)$value ? 'Man' : 'Woman';
    }
}