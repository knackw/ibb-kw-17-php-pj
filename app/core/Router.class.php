<?php

declare (strict_types=1);

namespace Core;

class Router
{
    public function routeParser($request, $url)
    {
        $url = trim($url);
        $kaboom = (MODE === "DEVELOPMENT") ? array_slice(explode('/', $url), 1) : explode('/', $url);
        $urlCount = count($kaboom);

        switch ($urlCount)
        {
            case $urlCount == 0:
                echo "";
                break;
            case $urlCount == 1:
                $request->controller =  ($kaboom[0] !== "") ? $kaboom[0] : "home";
                $request->action = 'index';
                $request->params = [];
                break;
            case $urlCount == 2:
                $request->controller = $kaboom[0];
                $request->action = ($kaboom[1] !== "") ? $kaboom[1] : "index";
                $request->params = [];
                break;
            case $urlCount >= 3:
                $request->controller = $kaboom[0];
                $request->action = $kaboom[1];
                $request->params = array_slice($kaboom, 2);
                break;
            default:
                break;
        }
    }

}