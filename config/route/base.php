<?php
$app->router->add("", function () use ($app) {
    $app->view->add("index");

    $app->renderPage();
});
