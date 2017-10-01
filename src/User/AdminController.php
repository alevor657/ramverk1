<?php

namespace Alvo\User;

use \Anax\Configure\ConfigureInterface;
use \Anax\Configure\ConfigureTrait;
use \Anax\DI\InjectionAwareInterface;
use \Anax\Di\InjectionAwareTrait;
// use \Alvo\User\HTMLForm\UserLoginForm;
// use \Alvo\User\HTMLForm\CreateUserForm;
use \Alvo\User\HTMLForm\UpdateUserForm;

/**
 * A controller class.
 */
class AdminController implements InjectionAwareInterface
{
    use InjectionAwareTrait;



    /**
     * Init module
     */
    public function init()
    {
        $this->session = $this->di->get("session");
        $this->response = $this->di->get("response");
        $this->user = $this->di->get("user");
        $this->view = $this->di->get("view");
        $this->pageRender = $this->di->get("pageRender");
    }



    public function isAdmin()
    {
        $admin = $this->user->getUser()->admin;
        if (!$admin) {
            $this->response->redirect("user");
        }
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
        $title = "Admin | All users";

        $data = $this->user->getAllUsers('email', $this->session->get('user')) ?: [];

        $this->view->add("admin/index", ["users" => $data]);
        $this->pageRender->renderPage(["title" => $title]);
    }



    public function editUser($id)
    {
        $title = "Admin | Edit user";

        $user = $this->user->getUser("id", $id);

        $form = new UpdateUserForm($this->di, $user);
        $form->check();

        $data = $this->user->getUser('id', $id);

        $this->view->add("user/profile", ["user" => $data, "form" => $form->getHTML()]);

        $this->pageRender->renderPage(["title" => $title]);
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



    public function getPostDeleteUser()
    {

    }



    public function logout()
    {
        $this->user->logout();
        $this->response->redirect("user/login");
    }
}
