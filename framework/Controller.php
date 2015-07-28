<?php
namespace framework;

abstract class Controller extends Object {

    private $_postData;

    private $_requestData;

    private $_view;
    /**
     * @var array
     */
    private $_config;

    public function __construct(View $view, array $config) {
        $this->_postData = $_POST;
        $this->_requestData = $_GET;
        $this->_view = $view;
        unset($this->_requestData['p']);
        $this->_config = $config;
    }

    protected function getRequestData() {
        return $this->_requestData;
    }

    protected function getPostData() {
        return $this->_postData;
    }

    protected function getView() {
        return $this->_view;
    }

    protected function getConfig() {
        return $this->_config;
    }

    protected function navigate($url ='') {
        header("Location: $url");
    }
}