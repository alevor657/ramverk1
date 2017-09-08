<?php

namespace Anax\Comments;

use \Anax\Common\AppInjectableInterface;
use \Anax\Common\AppInjectableTrait;

class commentsController implements AppInjectableInterface
{
    use AppInjectableTrait;

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
}
