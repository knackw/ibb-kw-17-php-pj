<?php

declare (strict_types=1);

namespace Core;
/**
 * Class Controller
 * @package Core
 */
abstract class Controller
{
    /**
     * Constructor
     */
    private function _constructor()
    {
        //silence is golden
    }

    /**
     *
     * Die Funktion fügt die Templates mit den Daten zusammen
     *
     * @param $filename
     * @param $data
     */
    public function render($filename, $data)
    {
        /**
         * Diese Funktion aktiviert die Ausgabepufferung.
         * Während die Ausgabepufferung aktiv ist, werden Skriptausgaben
         * nicht direkt an den Client weitergegeben,
         * sondern in einem internen Puffer gesammelt.
         */
        ob_start();
        /**
         *  Falls kein gültiges View existiert wird der Content Home ausgegeben
         */
        if (file_exists(APP_ROOT . 'mvc/views/' . $filename . '.html.php')) {
            require APP_ROOT . 'mvc/views/' . $filename . '.html.php';
        } else {
            require APP_ROOT . 'mvc/views/home.html.php';
        }
        /**
         * Schreibt den gepufferten Content in eine Variable und löschten den Ausgabepuffer.
         */
        $main_Content = ob_get_clean();

        /**
         * Ruft das Template auf und fügt den gepufferten Kontent ein
         */
        require_once APP_ROOT . 'mvc/views/templates/layout.html.php';
    }

}