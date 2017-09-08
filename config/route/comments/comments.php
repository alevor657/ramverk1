<?php

// $app->router->add("comments", []);

/**
 * Add a comment
 */
$app->router->post("comments", [$app->commentsController, "postItem"]);

/**
 * Get all comments
 */
$app->router->add("comments", [$app->commentsController, "getItems"]);

/**
 * Delete a post
 */
$app->router->get("comments/delete/{id:digit}", [$app->commentsController, "deleteItem"]);

/**
 * Edit a post
 */
$app->router->get("comments/edit/{id:digit}", [$app->commentsController, "editItem"]);
