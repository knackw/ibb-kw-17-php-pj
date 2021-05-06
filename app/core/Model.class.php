<?php

declare (strict_types=1);

namespace Core;
/**
 * Class Model
 * @package Core
 *
 * Abstrakte für Data Model für Datenbank und Session
 *
 */
abstract class Model
{
    protected ?Database $db;
    protected Session $session;

    /**
     * Model constructor.
     */
    public function __construct()
    {
        $instance = Database::getInstance();
        $this->db = $instance;
        $this->session = Session::getInstance();
    }
}