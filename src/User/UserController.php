<?php

namespace Alvo\User;

use \Anax\Configure\ConfigureInterface;
use \Anax\Configure\ConfigureTrait;
use \Anax\DI\InjectionAwareInterface;
use \Anax\Di\InjectionAwareTrait;
use \Alvo\User\HTMLForm\UserLoginForm;
use \Alvo\User\HTMLForm\CreateUserForm;

/**
 * A controller class.
 */
class UserController implements
    ConfigureInterface,
    InjectionAwareInterface
{
    use ConfigureTrait,
        InjectionAwareTrait;



    /**
     * Init module
     */
    public function init()
    {
        $this->session = $this->di->get("session");
        $this->response = $this->di->get("response");
        $this->utils = new UserUtils($this->di);
    }



    /**
     * Description.
     *
     * @param datatype $variable Description
     *
     * @throws Exception
     *
     * @return void
     */
    public function getIndex()
    {
        $title      = "A index page";
        $view       = $this->di->get("view");
        $pageRender = $this->di->get("pageRender");
        $user       = $this->di->get("user");

        // $data = $user->getUserData();
        // var_dump($data);
        // exit;

        $view->add("user/profile", $data);

        $pageRender->renderPage(["title" => $title]);
    }



    /**
     * Description.
     *
     * @param datatype $variable Description
     *
     * @throws Exception
     *
     * @return void
     */
    public function getPostLogin()
    {
        $title      = "A login page";
        $view       = $this->di->get("view");
        $pageRender = $this->di->get("pageRender");
        $response   = $this->di->get("response");
        $form       = new UserLoginForm($this->di);

        $form->check();

        $data = [
            "content" => $form->getHTML(),
        ];

        // var_dump($form);
        // exit;
        // $this->utils->login()

        // $response->redirect('user');

        $view->add("default2/article", $data);

        $pageRender->renderPage(["title" => $title]);
    }



    /**
     * Description.
     *
     * @param datatype $variable Description
     *
     * @throws Exception
     *
     * @return void
     */
    public function getPostCreateUser()
    {
        $title      = "A create user page";
        $view       = $this->di->get("view");
        $pageRender = $this->di->get("pageRender");
        $form       = new CreateUserForm($this->di);

        $form->check();

        $data = [
            "content" => $form->getHTML(),
        ];

        $view->add("default2/article", $data);

        $pageRender->renderPage(["title" => $title]);
    }



    public function getPostUpdateUser()
    {

    }



    public function getPostDeleteUser()
    {

    }



    public function logout()
    {
        $user = $this->di->get("user");
        $response = $this->di->get("response");

        $user->logout();
        $response->redirect("user/login");
    }
}
