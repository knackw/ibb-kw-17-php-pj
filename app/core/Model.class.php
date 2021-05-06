<?php

declare (strict_types=1);

namespace Core;

abstract class Model
{
    protected ?Database $db;
    protected Session $session;

    public function __construct()
    {
        $instance = Database::getInstance();
        $this->db = $instance;
        $this->session = Session::getInstance();
    }
}