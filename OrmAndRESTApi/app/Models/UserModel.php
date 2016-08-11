<?php

namespace Models;

use Orm\EntityModel;

/**
 * Class User implements logic to work with 'user' table.
 *
 * @package Spet\Orm.
 */
class UserModel extends EntityModel
{
    /**
     * Specify the table name to work with database.
     *
     * @var string $_tableName.
     */
    protected $_tableName = 'user';

    /**
     * Specify the id field name.
     *
     * @var string $_idName.
     */
    protected $_idName = 'id';

    /**
     * Specify the id field name.
     *
     * @var string $_idName.
     */
    protected $_email = 'email';

    /**
     * UsersController constructor,
     *     implement transfer connection to model.
     *
     * @param resource $dbh.
     * @param null $logger.
     */
    public function __construct($dbh, $logger = null)
    {
        parent::__construct($dbh, $this->_tableName, $this->_idName, $logger);

    }

    /**
     * Loading user, by email, to check him.
     *
     * @param $email
     * @return bool
     */
    public function loadByEmail($email)
    {
        $sql = "SELECT `password` FROM `" . $this->_tableName . "` WHERE " . $this->_email . " = ?";
        $sth = $this->_executeSql($sql, $email);
        $row = $sth->fetch(\PDO::FETCH_ASSOC);
        if($row !== false) {
            $this->_data = $row;
            return true;
        } else {
            return false;
        }
    }

    /**
     * Get user password.
     *
     * @return mixed
     */
    public function getPassword() {
        return $this->_data['password'];
    }

    /**
     * Magic method __call() is used for set or get properties,
     *     without creating get and set methods.
     *
     * @param string $name. Name of called function.
     * @param array $arguments. Arguments of called function.
     *
     * @return array $this->_updateData.
     */
    public function __call($name, $arguments)
    {
        $this->_functionName = substr($name, 0, 3);
        $name = strtolower(substr($name, 3));
        if($this->_functionName == 'get') {
            return !isset($this->_data[$name]) ? false : $this->_data[$name];
        } elseif($this->_functionName == 'set') {
            if(!isset($this->_data[$this->_idName])) {
                $this->_data[$name] = $arguments[0];
            } else {
                $this->_updateData[$name] = $arguments[0];
            }
        }
    }
}
