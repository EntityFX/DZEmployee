<?php

namespace application\view;

class ViewHelper {
    private static $_genderList = [
        0 => 'Female', 1 => 'Male'
    ];

    public static function getGender($gender) {
        return self::$_genderList[(bool)$gender];
    }

    public static function getGenderList() {
        return self::$_genderList;
    }

    public static function renderOptionsList($name, $id, array $data, $value = null, $class = '') {
        if (count($data) > 0) {

            ?>
                <select name="<?= $name ?>" id="<?= $id ?>" <?= (!empty($class)) ? "class=\"$class\"" : '' ?>>
            <?php
            foreach($data as $key => $item) {
                $selected = $key == $value;
                ?><option value="<?= $key ?>" <?= $selected ? 'selected' : '' ?>><?= $item?></option> <?php
            }
            ?>
                </select>
            <?php
        }
    }
}