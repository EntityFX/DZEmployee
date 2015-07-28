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


session_start();

//$_SESSION["who"] = "ami";
$_COOKIE["who"] = 4545;
//setcookie("who", "ami");

var_dump($_SESSION, $_COOKIE);

$manager = new EmployeeManager($settings);
$ratesManager = new RatesManager();
$rates = $ratesManager->getAll();

$employeeList = $manager->getAll();

?>

<?php include 'header.master.php'; ?>

<section class="list" >
    <div class="container" >
        <div class="row" >
            <div class="col-sm-12" >
                <div class="panel panel-default" >
                    <div class="panel-heading" >
                        <h2 class="panel-title" > List of Employee </h2 >
                    </div >
                    <div class="panel-body" >
                        <div class="row list-panel" >
                            <div class="col-sm-12" >
                                <a href = "add_employee.php" class="btn btn-primary btn-lg" >
                                    <span class="glyphicon glyphicon-plus" aria - hidden = "true" ></span > Add Employee
</a >
                            </div >
                        </div >
                        <div class="row" >
                            <div class="col-sm-12" >
                                <?php if (count($employeeList) > 0)  { ?>
                                <table class="table table-bordered table-striped table-hover" >
                                    <thead >
                                    <tr >
                                        <th > ID</th >
                                        <th > Name</th >
                                        <th > Age</th >
                                        <th > Gender</th >
                                        <th > Rate</th >
                                        <th ></th >
                                    </tr >
                                    </thead >
                                    <tbody >
                                    <?php foreach ($employeeList as $item) { ?>
                                        <tr>
                                            <td><a href="edit_employee.php?id=<?= $item->id ?>"><?= $item->id ?></a></td>
                                            <td><?= $item->name ?></td>
                                            <td><?= $item->age ?></td>
                                            <td><?= ViewHelper::getGender($item->gender) ?></td>
                                            <td><?= $rates[$item->rate] ?></td>
                                            <td class="rem-row">
                                                <a href="delete_employee.php?id=<?= $item->id ?>" class="btn btn-danger">
                                                        <span class="glyphicon glyphicon-trash"
                                                              aria-hidden="true"></span>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    </tbody >
                                </table >
                                <?php } ?>
                            </div >
                        </div >
                    </div >
                </div >
            </div >
        </div >
    </div >
</section >
</body >
</html >