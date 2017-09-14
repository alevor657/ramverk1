<?php

// $app->router->add("comments", []);

/**
 * Add a comment
 */
// $app->router->post("comments", [$app->commentsController, "postItem"]);

/**
 * Get all comments
 */
// $app->router->add("comments", [$app->commentsController, "getItems"]);

/**
 * Delete a post
 */
// $app->router->get("comments/delete/{id:digit}", [$app->commentsController, "deleteItem"]);

/**
 * Edit a post
 */
// $app->router->get("comments/edit/{id:digit}", [$app->commentsController, "editItem"]);


return [
    "routes" => [
        [
            "info" => "Post a comment",
            "requestMethod" => "post",
            "path" => null,
            "callable" => ["commentsController", "postItem"],
        ],
        [
            "info" => "Get all comments",
            "requestMethod" => "get",
            "path" => null,
            "callable" => ["commentsController", "getItems"],
        ],
        [
            "info" => "Delte a comment",
            "requestMethod" => "get",
            "path" => "delete/{id:digit}",
            "callable" => ["commentsController", "deleteItem"],
        ],
        [
            "info" => "Edit a comment",
            "requestMethod" => "get",
            "path" => "edit/{id:digit}",
            "callable" => ["commentsController", "editItem"],
        ],
    ]
];
