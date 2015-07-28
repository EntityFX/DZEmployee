<?php
namespace framework;

class View extends Object{
    public function render($renderTemplate, $data, $masterTemplate = '') {
        $model = $data;
        $viewStartPath = __DIR__ . "/../view/";
        $masterPageFile = $viewStartPath . $masterTemplate . '.php';
        $viewFile = $viewStartPath . $renderTemplate . '.php';

        include (strlen($masterTemplate) > 0 && file_exists($masterPageFile))
            ? $masterPageFile : $viewFile;
    }
}