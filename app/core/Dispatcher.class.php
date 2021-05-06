<?php

use Core\Request;
use Core\Router;

class Dispatcher
{

    private Request $request;
    public Router $router;

    public function dispatch()
    {
        $this->request = new Request();
        $this->router = new Router();
        $this->router->routeParser($this->request, $this->request->url);
        $controller = $this->loadController();
        call_user_func_array([$controller, $this->request->action], $this->request->params);
    }

    public function loadController()
    {
        $pageController = 'Mvc\\Controllers\\' . ucfirst($this->request->controller) . 'Controller';
        return new $pageController();
    }

}