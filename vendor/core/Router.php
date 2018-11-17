<?php

namespace vendor\core;

//Описание роутера

/**
 * Class Router
 */
class Router{

    /**
     * таблица маршрутов
     * @var array
     */
    protected static $routes = [];

    /**
     * текущий маршрут
     * @var array
     */
    protected static $route = [];

    /**
     * добавляет маршрут в таблицу маршрутов
     * @param string $regexp регулярное выражение
     * @param  array $route маршрут ([controller, action, params])
     */
    public static function add($regexp, $route = []){
        self::$routes[$regexp]= $route;

}

    /**
     * возврвщает таблицу маршрутов
     * @return  array
     */
public  static  function getRoutes(){
        return self::$routes;
}

    /**
     * возврвщает текущий маршрут (controller, action, [params])
     * @return  array
     */

    public  static  function getRoute(){
        return self::$route;
    }

    /**
     * Ищет URL в таблице маршрутов
     * @param string $url входящий URL
     * @return boolean
     */
    public static function matchRoute($url){
        foreach (self::$routes as $pattern=>$route){
            if(preg_match("#$pattern#i", $url, $matches)){
                foreach ($matches as $k=>$v){
                    if(is_string($k)){
                        $route[$k] = $v;
                    }
                }
                if(!isset($route['action'])){
                    $route['action'] = 'index';
                }
                $route['controller'] = self::upperCamelCase($route['controller']);
                self::$route = $route;
                return true;
            }
        }
        return false;
    }


    /**
     * Перенаправляет URL  по корруктному маршруту
     * @param string $url входящий URL
     * @return void
     */
    public static function dispatch($url){
        $url = self::removeQueryString($url);
        if(self::matchRoute($url)){
            $controller = 'app\controllers\\'.self::$route['controller'];
                if(class_exists($controller)){
                    $cObj = new $controller(self::$route);
                    $action = self::lowerCamelCase(self::$route['action']).'Action';
                    if(method_exists($cObj, $action)){
                        $cObj->$action();
                    }else{
                        echo "Метод <b>$controller::$action</b> не найден";
                    }
                }else{
                   echo "Контроллер <b>$controller</b> не найден";
                }
            }else{
                http_response_code(404);
                include '404.html';
            }
    }

protected static function upperCamelCase($name){
       return str_replace(' ','', ucwords(str_replace('-',' ',$name)));

}
    protected static function lowerCamelCase($name){
        return lcfirst(self::upperCamelCase($name)) ;

    }
    protected static function removeQueryString($url){
        if ($url){
            $params = explode('&', $url, 2);
            if(false===strpos($params[0], '=')){
                return rtrim($params[0], '/');
            }else{
                return '';
            }
        }
    }
}

