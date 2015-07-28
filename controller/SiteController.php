<?php
namespace application\controller;

require_once '../model/contracts/EmployeeManagerInterface.php';
require_once '../model/contracts/RatesManagerInterface.php';
require_once '../model/implementation/EmployeeManager.php';
require_once '../model/implementation/RatesManager.php';
require_once '../model/contracts/Employee.php';


use application\model\contracts\Employee;
use application\model\contracts\EmployeeManagerInterface;
use application\model\implementation\EmployeeManager;
use application\model\implementation\RatesManager;
use framework\Controller;
use framework\View;

class SiteController extends Controller {

    /**
     * @var EmployeeManagerInterface
     */
    private $_employeeManager;
    /**
     * @var RatesManager
     */
    private $_ratesManager;

    function __construct(View $view, $config) {
        parent::__construct($view, $config);
        $this->_employeeManager = new EmployeeManager($this->config);
        $this->_ratesManager = new RatesManager();
    }

    public function actionIndex() {
        $employeeList = $this->_employeeManager->getAll();
        $rates = $this->_ratesManager->getAll();
        $this->view->render('index', [
            'employeeList' => $employeeList,
            'rates' => $rates
        ], 'master');
    }

    public function actionEdit() {
        if (isset($_GET["id"])) {
            $employee = $this->_employeeManager->getById((int)$_GET["id"]);
            $rates = $this->_ratesManager->getAll();
            $this->view->render('edit', [
                'employee' => $employee,
                'rates' => $rates
            ], 'master');
        }
    }

    public function actionAdd() {
        if (!empty($_POST)) {
            $model = new Employee();
            $model->name = $_POST['Employee_name'];
            $model->age = $_POST['Employee_age'];
            $model->gender = $_POST['Employee_gender'];
            $model->rate = $_POST['Employee_rate'];

            $this->_employeeManager->create($model);

            $this->navigate('?p=site/index');
        } else {
            $rates = $this->_ratesManager->getAll();
            $this->view->render('add', [
                'rates' => $rates
            ], 'master');
        }
    }

    public function actionDelete() {
        if (isset($_GET["id"])) {
            $this->_employeeManager->delete((int)$_GET["id"]);
        }
        $this->navigate('?p=site/index');
    }
}