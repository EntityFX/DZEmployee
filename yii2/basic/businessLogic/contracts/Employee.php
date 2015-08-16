<?php
namespace app\businessLogic\contracts;

use yii\base\Object;

/**
 * Employee model
 *
 * @package application\controller
 */
class Employee extends Object {
    /**
     * @var int
     */
    private $_id;
    /**
     * @var string
     */
    private $_name;
    /**
     * @var int
     */
    private $_age;
    /**
     * @var boolean
     */
    private $_gender;
    /**
     * @var int
     */
    private $_rate;

    /**
     * @var string
     */
    private $_email;

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->_email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->_email = $email;
    }
    /**
     * @return int
     */
    public function getAge() {
        return $this->_age;
    }
    /**
     * @param int $age
     */
    public function setAge($age) {
        $this->_age = (int)$age;
    }
    /**
     * @return boolean
     */
    public function getGender() {
        return $this->_gender;
    }
    /**
     * @param boolean $gender
     */
    public function setGender($gender) {
        $this->_gender = (boolean)$gender;
    }
    /**
     * @return int
     */
    public function getId() {
        return $this->_id;
    }
    /**
     * @param int $id
     */
    public function setId($id) {
        $this->_id = (int)$id;
    }
    /**
     * @return string
     */
    public function getName() {
        return $this->_name;
    }
    /**
     * @param string $name
     */
    public function setName($name) {
        $this->_name = (string)$name;
    }
    /**
     * @return int
     */
    public function getRate() {
        return $this->_rate;
    }
    /**
     * @param int $rate
     */
    public function setRate($rate) {
        $this->_rate = (int)$rate;
    }
}