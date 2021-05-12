<?php

declare (strict_types=1);

namespace Core;

/**
 * Class Router
 * @package Core
 *
 * Der Router ist dafür zuständig den Request zu parsen, um anschließend den für die Nutzeraktion
 * zuständigen Controller aufzurufen
 *
 */
class Router
{
    /**
     * Constructor
     */
    private function _constructor()
    {
        //silence is golden
    }

    /**
     * @param $request
     * @param $url
     *
     * Nutzeraktionsparser
     *
     */
    public function routeParser($request, $url)
    {
        $url = trim($url);
        $expRequest = array_slice(explode('/', $url), 1);
        $urlCount = count($expRequest);

        switch ($urlCount) {
            /**
             * Das sollte nie passieren
             */
            case $urlCount == 0:
                echo "";
                break;
            /**
             * Seitenaufruf ohne Request
             */
            case $urlCount == 1:
                $request->controller = ($expRequest[0] !== "") ? $expRequest[0] : "home";
                $request->action = 'index';
                $request->params = [];
                break;
            /**
             * Seitenaufruf nur Controller
             */
            case $urlCount == 2:
                $request->controller = $expRequest[0];
                $request->action = ($expRequest[1] !== "") ? $expRequest[1] : "index";
                $request->params = [];
                break;
            /**
             * Seitenaufruf Controller und Aktion
             */
            case $urlCount >= 3:
                $request->controller = $expRequest[0];
                $request->action = $expRequest[1];
                $request->params = array_slice($expRequest, 2);
                break;
            default:
                break;
        }
    }

}