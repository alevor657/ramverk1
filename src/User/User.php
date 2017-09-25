<?php

namespace Alvo\User;

use \Anax\Database\ActiveRecordModel;
use \Anax\DI\InjectionAwareInterface;
use \Anax\DI\InjectionAwareTrait;

/**
 * A database driven model.
 */
class User extends ActiveRecordModel implements InjectionAwareInterface
{
    use InjectionAwareTrait;



    /**
     * @var string $tableName name of the database table.
     */
    public static $tableName = "User";

    /**
     * Columns in the table.
     *
     * @var integer $id primary key auto incremented.
     */
    public $id;
    public $email;
    public $password;
    public $created;
    public $updated;
    public $deleted;
    public $active;
    public $admin;



    /**
     * Set the password.
     *
     * @param string $password the password to use.
     *
     * @return void
     */
    public function setPassword($password)
    {
        $this->password = password_hash($password, PASSWORD_DEFAULT);
    }



    /**
     * Verify the email and the password, if successful the object contains
     * all details from the database row.
     *
     * @param string $email  email to check.
     * @param string $password the password to use.
     *
     * @return boolean true if email and password matches, else false.
     */
    public function verifyPassword($email, $password)
    {
        $this->find("email", $email);
        return password_verify($password, $this->password);
    }
}
