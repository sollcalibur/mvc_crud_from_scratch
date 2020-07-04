<?php
class Router
{
    static public function parse($url, $request)
    {
        $url = trim($url);
        $base_url = "/" . AppConfig::APP_BASE_URL . "/";

        if ($url == $base_url) {
            // controller class CrudController 
            $request->controller = "crud";
            // controller class function index()
            $request->action = "index";
            // controller class function index(params)
            $request->params = [];
        } else {
            $explode_url = explode('/', $url);
            $explode_url = array_slice($explode_url, 2);
            $request->controller = $explode_url[0];
            $request->action = $explode_url[1];
            $request->params = array_slice($explode_url, 2);
        }
    }
}
