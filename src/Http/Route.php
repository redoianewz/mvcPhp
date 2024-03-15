<?php

namespace ouaaz\Http;

class Route
{
    public Request $request;
    public Response $response;

    public function __construct(Request $request, Response $response)
    {
        $this->request = $request;
        $this->response = $response;
    }
   public static array $routes = [];

    public static function get($route, $action)
    {
        self::$routes['get'][$route] = $action;
    }
    public static function post($route, $action)
    {
        self::$routes['post'][$route] = $action;
    }
    public static function put($route, $action)
    {
        self::$routes['put'][$route] = $action;
    }
    public static function delete($route, $action)
    {
        self::$routes['delete'][$route] = $action;
    }
    public static function patch($route, $action)
    {
        self::$routes['patch'][$route] = $action;
    }
    public  function resolve()
    {
        $method = $this->request->method();
        $path = $this->request->path();
        $action = self::$routes[$method][$path] ?? false;
        // var_dump($action);
        if (!$action) {
            echo '404 - Not Found';
            return;
        }
      
        if(is_callable($action)){
            call_user_func($action,[]);
        }
        if(is_array($action)){
           
            call_user_func([new $action[0], $action[1]],[]);
        }
  
    }

}
