<?php

declare (strict_types=1);

namespace Core;

class Request
{
    public string $url;
    public string $controller;
    public string $public_Root_Folder;

    public function __construct()
    {
        //$_SERVER["REQUEST_URI"] = "/cart";
        if (isset($_SERVER["REQUEST_URI"])) {
            $this->url = $_SERVER["REQUEST_URI"];
        } else {
            $this->url = "/home";
        }
    }
}