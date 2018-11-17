<?php
/**
 * Created by PhpStorm.
 * User: marat
 * Date: 17.11.2018
 * Time: 15:40
 */

namespace vendor\core\base;


class View
{
    /**
     * текущий маршрут и параметры (controller, action, params)
     * @var array
     */
    public $route = [];

    /**
     * текущий вид
     * @var string
     */
    public $view = [];
    /**
     * текущий шаблон
     * @var string
     *
     */
    public $layout = [];
}