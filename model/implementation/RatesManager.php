<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Гузалия
 * Date: 28.07.15
 * Time: 3:05
 * To change this template use File | Settings | File Templates.
 */

namespace application\model\implementation;


use application\model\contracts\RatesManagerInterface;

class RatesManager implements RatesManagerInterface {

    function getAll() {
        return [
            0 => 'Dev 2',
            1 => 'Dev 3',
            2 => 'Dev 4',
            3 => 'Dev 5',
            4 => 'Dev T',
            5 => 'Sda 1',
        ];
    }
}