<?php
/**
 * @link      http://entityfx.ru
 * @copyright Copyright (c) 2015 DZEmployee
 * @author    :
 */
use application\model\contracts\Employee;
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
$ratesManager = new RatesManager();

$employee = null;
if (isset($_GET["id"])) {
    $employee = $manager->getById((int)$_GET["id"]);
}

$rates = $ratesManager->getAll();
$genders = ViewHelper::getGenderList();

$employeeList = $manager->getAll();

if ($employee === null) {
    exit;
}

?>

<?php include 'header.master.php'; ?>

<section class="add">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2 class="panel-title">Add Employee</h2>
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal" method="post" >
                            <div class="form-group">
                                <label class="col-sm-2 control-label">ID</label>
                                <div class="col-sm-10">
                                    <p class="form-control-static"><strong><?= $employee->id ?></strong></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="Employee-name" class="col-sm-2 control-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="Employee-name"
                                           name="Employee_name" value="<?= $employee->name ?>"
                                           placeholder="Type employee name" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="Employee-age" class="col-sm-2 control-label">Age</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" id="Employee-age"
                                           name="Employee_age" value="<?= $employee->age ?>"
                                           placeholder="Select age" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="Employee-gender" class="col-sm-2 control-label">Gender</label>
                                <div class="col-sm-10">
                                    <?php ViewHelper::renderOptionsList("Employee_gender", "Employee-gender", $genders, $employee->gender, "form-control") ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="Employee-rate" class="col-sm-2 control-label">Rate</label>
                                <div class="col-sm-10">
                                    <?php ViewHelper::renderOptionsList("Employee_rate", "Employee-rate", $rates, $employee->rate, "form-control") ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-primary btn-lg">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
</body >
</html >