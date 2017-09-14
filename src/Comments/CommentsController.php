<?php

namespace Anax\Comments;

use \Anax\DI\InjectionAwareInterface;
use \Anax\DI\InjectionAwareTrait;

class CommentsController implements InjectionAwareInterface
{
    use InjectionAwareTrait;

    public function postItem()
    {
        $data = $this->app->request->getPost();
        $this->app->comments->postItem($data);
        $this->app->redirect("comments");
    }

    public function getItems()
    {
        $items = $this->app->comments->getItems();

        $this->app->view->add("comments/index", ["data" => $items]);
        $this->app->renderPage(["data" => $items]);
    }

    public function deleteItem($id)
    {
        $this->app->comments->delteItem($id);
        $this->app->redirect("comments");
    }

    public function editItem($id)
    {
        $item = $this->app->comments->getItem($id);
        $items = $this->app->comments->getItems();

        $this->app->view->add("comments/index", ["data" => $items, "chosenPost" => $item]);
        $this->app->renderPage(["data" => $items]);
    }
}
