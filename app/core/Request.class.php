<?php

declare (strict_types=1);

namespace Core;
/**
 * Class Request
 * @package Core
 *
 * Erzeugt die Request Klasse der Nutzeraktion
 *
 */
class Request
{
    public string $url;
    public string $controller;
    public string $public_Root_Folder;
    public string $action;
    public mixed $params;

    /**
     * Constructor
     */
    public function __construct()
    {
        if (isset($_SERVER["REQUEST_URI"])) {
            $this->url = $_SERVER["REQUEST_URI"];
        } else {
            $this->url = "/home";
        }
    }
}