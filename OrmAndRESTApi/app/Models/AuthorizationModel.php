<?php

namespace Models;

use Core\Model;
use Lib\Validate;

class AuthorizationModel extends Model
{
    public $email;
    public $password;
    public $remember;
    public $dbh;

    /**
     * Specify the options for encrypting password.
     *
     * @var array $optionsForPass.
     */
    protected $optionsForPass = array('cost' => 7);

    public function setData($data)
    {
        $validate = new Validate();

        if (!filter_var($data['email'] = $validate->clearInput($data['email']), FILTER_VALIDATE_EMAIL) === false) {
            $this->email = $data['email'];
        } else {
            $this->_setSession('no');
            return false;
        }

        $this->password = $validate->clearInput($data['password']);
        $this->optionsForPass['salt'] = 'D/vtVeH03t213d!@$' . strrev($this->password);
        $this->password = password_hash($this->password, PASSWORD_BCRYPT, $this->optionsForPass);
        $this->remember = $validate->clearInput($data['remember']);

        $this->dbh = $this->getConnect();

        $user = new UserModel($this->dbh);
        if($user->loadByEmail($this->email) === true && (($userPassword = $user->getPassword()) == $this->password)) {
            if($this->remember == 'yes') {
                $this->_setSession('yes', 'yes');
            } else {
                $this->_setSession('yes');
            }
            return true;
        } else {
            $this->_setSession('no');
            return false;
        }
    }

    protected function _setSession($validate, $reminder = 'no')
    {
        $_SESSION['validate'] = $validate;
        $_SESSION['reminder'] = $reminder;
    }
}