<?php

// $app->router->add("comments", []);

/**
 * Add a comment
 */
$app->router->post("comments/add", [$app->commentsController, "postItem"]);

/**
 * Get all comments
 */
$app->router->add("comments", [$app->commentsController, "getItems"]);
