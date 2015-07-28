<?php
require_once 'ViewHelper.php';

use application\model\contracts\Employee;
use application\view\ViewHelper;

?>

<?php
/** @var $model Employee */
$employeeList = $model['employeeList'];
$rates = $model['rates'];
?>

<section class="list">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2 class="panel-title">List of Employee</h2>
                    </div>
                    <div class="panel-body">
                        <div class="row list-panel">
                            <div class="col-sm-12">
                                <a href="?p=site/add" class="btn btn-primary btn-lg">
                                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>Add Employee
                                </a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <?php if (isset($employeeList) && count($employeeList) > 0) { ?>
                                    <table class="table table-bordered table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Age</th>
                                                <th>Gender</th>
                                                <th>Rate</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($employeeList as $item) { ?>
                                            <tr>
                                                <td><a href="?p=site/edit&id=<?= $item->id ?>"><?= $item->id ?></a></td>
                                                <td><?= $item->name ?></td>
                                                <td><?= $item->age ?></td>
                                                <td><?= ViewHelper::getGender($item->gender) ?></td>
                                                <td><?= $rates[$item->rate] ?></td>
                                                <td class="rem-row">
                                                    <a href="?p=site/delete&id=<?= $item->id ?>" class="btn btn-danger">
                                                        <span class="glyphicon glyphicon-trash"
                                                              aria-hidden="true"></span>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                    </table>

                                <?php } else { ?>
                                    <div class="alert-info">

                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>