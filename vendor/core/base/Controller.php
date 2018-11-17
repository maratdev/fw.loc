<?php
/**
 * Created by PhpStorm.
 * User: marat
 * Date: 28.10.2018
 * Time: 21:52
 */

namespace vendor\core\base;


abstract class Controller
{
    public $route = [];
    public $view;
    public function __construct($route)
    {
        $this->route = $route;

    }

}