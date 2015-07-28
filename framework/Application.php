<?php
namespace framework;

require_once 'Object.php';
require_once 'Model.php';
require_once 'View.php';
require_once 'Controller.php';

class Application extends Object {
    private $_controllerName = "site";

    private $_actionName = "index";

    private $_requestRote;

    private $_controller;

    public function run(array $config = null) {
        $this->_requestRote = $_GET['p'];
        if ($this->_requestRote !== null) {
            $routes = explode('/', $this->_requestRote);

            if (isset($routes[0])) {
                $this->_controllerName = $routes[0];
            }

            if (isset($routes[1])) {
                $this->_actionName = $routes[1];
            }
        }


        $controllerClassName = ucfirst(strtolower($this->_controllerName)) . "Controller";
        $fullControllerClassName = 'application\\controller\\' . $controllerClassName;

        $controllerActionName = "action" . ucfirst(strtolower($this->_actionName));

        $controllerClassPath = __DIR__ . "/../controller/" . $controllerClassName . '.php';

        if (file_exists($controllerClassPath)) {
            include_once $controllerClassPath;
        } else {
            $this->do404();
        }

        $this->_controller = new $fullControllerClassName(new View(), $config);

        if (method_exists($this->_controller, $controllerActionName)) {
            $this->_controller->$controllerActionName();
        } else {
            $this->do404();
        }
    }

    public function do404() {
        $host = 'http://'.$_SERVER['HTTP_HOST'].'/';
        header('HTTP/1.1 404 Not Found');
        header("Status: 404 Not Found");
        header('Location:'.$host.'404');
        echo "Erorr 404: page {$this->_requestRote} not found";
        exit;
    }
}