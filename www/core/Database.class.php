<?php

declare (strict_types=1);

namespace Core;

use mysqli;

/**
 * Class Database
 * @package Core
 *
 * Klasse Datenbank (Todo: in DAO umsetzen)
 *
 */
class Database
{

    private mysqli $connections;
    public mixed $last;
    public int $insertId;
    private static ?Database $instance = null;

    /**
     * @return Database|null
     *
     * Es wird nur eine Instance der Klasse erzeugt
     *
     */
    public static function getInstance(): ?Database
    {
        if (!self::$instance) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    /**
     * Database constructor.
     */
    private function __construct()
    {
        $this->connections = new mysqli(SERVER, USERNAME, PASSWORD, DB);
        if (mysqli_connect_errno()) {
            trigger_error('Error connecting to host. ' . $this->connections->error, E_USER_ERROR);
        }
    }

    /**
     * @param $queryStr
     * @return bool
     *
     * Abfrage ausführen
     *
     */
    public function runQuery($queryStr): bool
    {
        if (!$result = $this->connections->query($queryStr)) {
            trigger_error('Fehler beim Ausführen der Abfrage: ' . $queryStr . ' -' . $this->connections->error, E_USER_ERROR);
        } else {
            $this->last = $result;
            $this->insertId = $this->connections->insert_id;
            return TRUE;
        }
    }

    /**
     * @return mixed
     *
     * Daten holen
     *
     */
    public function getData(): mixed
    {
        return $this->last->fetch_array(MYSQLI_ASSOC);
    }

    /**
     * @param $table
     * @param $condition
     * @param $limit
     *
     * Daten löschen
     *
     */
    public function deleteData($table, $condition, $limit)
    {
        $limit = ($limit == '') ? '' : ' LIMIT ' . $limit;
        $delete = "DELETE FROM {$table} WHERE {$condition} {$limit}";
        $this->runQuery($delete);
    }

    /**
     * @return mixed
     *
     * Anzahl der Datensätze
     *
     */
    public function numRows(): mixed
    {
        return $this->last->num_rows;
    }

    /**
     * @param $table
     * @param $changes
     * @param $condition
     * @return bool
     *
     * Datensatz aktualisieren
     *
     */
    public function updateData($table, $changes, $condition): bool
    {
        $update = "UPDATE " . $table . " SET ";
        foreach ($changes as $field => $value) {
            $update .= "`" . $field . "`='{$value}',";
        }

        $update = substr($update, 0, -1);
        if ($condition != '') {
            $update .= "WHERE " . $condition;
        }
        $this->runQuery($update);
        return true;
    }

    /**
     * @param $table
     * @param $data
     * @return bool
     *
     * Datensatz einfügen
     *
     */
    public function insertData($table, $data): bool
    {
        $fields = "";
        $values = "";
        foreach ($data as $f => $v) {
            $fields .= "`$f`,";
            $values .= (is_numeric($v) && (intval($v) == $v)) ?
                $v . "," : "'$v',";
        }
        $fields = substr($fields, 0, -1);

        $values = substr($values, 0, -1);
        $insert = "INSERT INTO $table ({$fields}) VALUES({$values})";
        return $this->runQuery($insert);
    }

    /**
     * @param $value
     * @return string
     *
     * Daten säubern
     *
     */
    public function cleanData($value): string
    {
        if ((function_exists("get_magic_quotes_gpc") && get_magic_quotes_gpc()) || (ini_get('magic_quotes_sybase') && (strtolower(ini_get('magic_quotes_sybase')) != "off"))) {
            $value = stripslashes($value);
        }
        if (version_compare(phpversion(), "4.3.0") == "-1") {
            $value = $this->connections->escape_string($value);
        } else {
            $value = $this->connections->real_escape_string($value);
        }
        return $value;
    }

    /**
     * Destructor
     */
    public function __destruct()
    {
        $this->connections->close();
    }
}