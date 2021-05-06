<?php

namespace Core;

abstract class Controller
{
    /**
     *
     * Die Funktion fügt die Ansicht mit den Daten zusammen
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
         * Holt sich den gepufferten Content im Ausgabepuffer und löschten den Ausgabepuffer.
         */
        $main_Content = ob_get_clean();

        /**
         * Holt sich den gepufferten Content im Ausgabepuffer und löschten den Ausgabepuffer.
         */
        require_once APP_ROOT . 'mvc/views/templates/layout.html.php';
    }

}