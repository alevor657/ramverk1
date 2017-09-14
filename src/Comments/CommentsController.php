<?php

namespace Anax\Comments;

use \Anax\DI\InjectionAwareInterface;
use \Anax\DI\InjectionAwareTrait;

class CommentsController implements InjectionAwareInterface
{
    use InjectionAwareTrait;

    public function postItem()
    {
        $comments = $this->di->get("comments");
        $request = $this->di->get("request");
        $response = $this->di->get("response");

        $data = $request->getPost();
        $comments->postItem($data);
        $response->redirect("comments");
    }

    public function getItems()
    {
        $comments = $this->di->get("comments");
        $view = $this->di->get("view");
        $pageRender = $this->di->get("pageRender");

        $items = $comments->getItems();

        $view->add("comments/index", ["data" => $items, "test" => "CAN SEE"]);
        $pageRender->renderPage();
    }

    public function deleteItem($id)
    {
        $comments = $this->di->get("comments");
        $response = $this->di->get("response");

        $comments->delteItem($id);
        $response->redirect("comments");
    }

    public function editItem($id)
    {
        $comments = $this->di->get("comments");
        $view = $this->di->get("view");
        $pageRender = $this->di->get("pageRender");

        $item = $comments->getItem($id);
        $items = $comments->getItems();

        $view->add("comments/index", ["data" => $items, "chosenPost" => $item]);
        $pageRender->renderPage();
    }
}
