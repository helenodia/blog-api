<?php

$router->group(["prefix" => "articles"], function ($router) {

$router->post("", "Articles@store");
$router->get("", "Articles@index");
$router->get("{article}", "Articles@show"); //pointg at show function in Articles controller
$router->delete("{article}", "Articles@destroy");
$router->put("{article}", "Articles@update"); //in curlys as you have to specify an article - can't just delete nothing

$router->post("{article}/comments", "Comments@store");
$router->get("{article}/comments", "Comments@index");

});

