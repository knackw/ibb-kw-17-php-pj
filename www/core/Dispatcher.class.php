<?php

/**
 * Strict Types funktioniert nicht und wurde auskommentiert Todo
 */

//declare (strict_types=1);

use Core\Controller;
use Core\Request;
use Core\Router;

/**
 * Class Dispatcher
 *
 * Zentrale Navigationskontrolle zur Auswahl der nächsten Webseite.
 * Über den Nutzer Request(Aktion) wird der Content der Webseite geroutet.
 */
class Dispatcher
{
    /**
     * @var Request
     *
     * Fängt den Request oder die Aktion des Nutzers auf
     */
    private Request $request;
    /**
     * @var Request
     *
     * Routet die Nutzeraktion
     */
    public Router $router;

    /**
     * Mit der dispatch Funktion wird Über den Nutzer Request(Aktion) der Content der Webseite geroutet.
     */
    public function dispatch()
    {
        $this->request = new Request();
        $this->router = new Router();
        /**
         * Hier wird der Request geparst und geroutet
         */
        $this->router->routeParser($this->request, $this->request->url);
        /**
         * Aufruf der Controller Klasse und der Action Funktion mit Übergabe der Parameter
         */
         call_user_func_array([$this->loadController(), $this->request->action], $this->request->params);
    }

    /**
     * @return Controller
     *
     * Lädt die geroutete Controller Klasse
     *
     */
    public function loadController(): Controller
    {
        $pageController = 'Mvc\\Controllers\\' . ucfirst($this->request->controller) . 'Controller';
        if (class_exists($pageController))
            return new $pageController();
        else
            exit;
    }

}