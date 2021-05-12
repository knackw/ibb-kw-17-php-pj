<?php

use Core\Model;

require_once "constants.php";
require_once "../core/Model.class.php";
require_once "../core/Database.class.php";
require_once "../core/Session.class.php";

/**
 * Class TableCreator
 *
 * Produktgenerator
 *
 */
class TableCreator extends Model
{

    private string $output = "";

    /**
     * @return string
     *
     * Produkte generieren
     *
     */
    public function createProductTable(): string
    {
        if (!$this->db->runQuery("CREATE TABLE IF NOT EXISTS products
        (   id INT(11) AUTO_INCREMENT,
            name VARCHAR(255) NOT NULL,
            price decimal (11, 2) NOT NULL,
            image VARCHAR(255) NOT NULL,
            caption VARCHAR(140) NOT NULL,
            total_rate_points INT(11) NOT NULL DEFAULT '0',
            total_raters INT(11) NOT NULL DEFAULT '0',
            average_rating INT(11) NOT NULL DEFAULT '0',
            date_uploaded DATETIME,
            status ENUM('active', 'inactive') NOT NULL DEFAULT 'active',
            PRIMARY KEY(id)
        ) ")) {
            $this->output .= '<strong>ERROR:</strong> An error occured while creating the Product Table';
        } else {
            $this->output .= '<strong>SUCCESS:</strong> <strong> Product Table </strong> was <strong> successfully </strong> created';

            // Insert Dummy Data
            $dummyProducts = ['apfel' => '0.3', 'bier' => '2', 'wasser' => '1', 'kaese' => '3.74'];
            $this->output .= '<p> --------------------- </p>';
            foreach ($dummyProducts as $key => $product) {
                if ($key == "apfel" || $key == "kaese") {
                    $article = "der";
                } else {
                    $article = "das";
                }
                $key_ = ucfirst($key);
                $data = [
                    'name' => $key,
                    'price' => $product,
                    'image' => $key . '.png',
                    'caption' => 'Das ist ' . $article . ' beste ' . $key_ . ' auf der Welt',
                    'date_uploaded' => date("Y-m-d H:i:s")
                ];
                if (!$this->db->InsertData("products", $data)) {
                    $this->output .= '<p><strong>An Error</strong> occured while inserting the <strong>' . ucfirst($key) . '</strong> record';
                } else {
                    $this->output .= '<p><strong> ' . ucfirst($key) . ' record </strong> was <strong> successfully </strong> inserted </p>';
                }
            }
        }
        return $this->output;
    }
}

$tables_Creator = new TableCreator();
echo $tables_Creator->createProductTable();
