<?php

namespace Alvo\User;

use \Anax\DI\InjectionAwareInterface;
use \Anax\Di\InjectionAwareTrait;

/**
 *  Utils functions
 */
class UserUtils implements InjectionAwareInterface
{
    use InjectionAwareTrait;



    /**
     * Init the module
     *
     * @return void
     */
    public function init()
    {
        $this->session = $this->di->get("session");
        $this->db = $this->di->get("db");
    }



    /**
     * Login
     *
     * @param  string $email Email adress from form
     * @param  string $pass  Unhashed string
     *
     * @return bool        true if ok, else false
     */
    public function login($email, $pass)
    {
        $user = $this->db
            ->connect()
            ->select("email, id, password")
            ->from("User")
            ->where("email='$email'")
            ->execute()
            ->fetch();

        if (!$user) {
            return false;
        }

        $passCheck = password_verify($pass, $user->password);

        if ($passCheck) {
            $this->session->set("user", $user->email);
            $this->session->set("userId", $user->id);
            return true;
        }

        return false;
    }



    public function logout()
    {

    }



    public function register()
    {

    }



    public function isAdmin()
    {

    }



    public function getUser()
    {

    }



    public function getAllUsers()
    {

    }
}
