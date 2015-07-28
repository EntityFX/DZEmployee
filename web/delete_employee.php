<?php
/**
 * @link      http://entityfx.ru
 * @copyright Copyright (c) 2015 DZEmployee
 * @author    :
 */
use application\model\implementation\EmployeeManager;
use application\model\implementation\RatesManager;
use application\view\ViewHelper;

require_once '../framework/Object.php';
require_once '../model/contracts/Employee.php';
require_once '../model/contracts/EmployeeManagerInterface.php';
require_once '../model/contracts/RatesManagerInterface.php';
require_once '../model/implementation/RatesManager.php';
require_once '../model/implementation/EmployeeManager.php';
require_once '../view/ViewHelper.php';

$settings = include 'settings.php';

$manager = new EmployeeManager($settings);

$employee = null;
if (isset($_GET["id"])) {
    $employee = $manager->delete((int)$_GET["id"]);
    header("Location: employee_list.php");
}


?>
