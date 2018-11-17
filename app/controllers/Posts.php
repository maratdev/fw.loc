<?php

namespace app\controllers;
/**
 * Created by PhpStorm.
 * User: marat
 * Date: 12.10.2018
 * Time: 21:56
 */
class Posts extends \vendor\core\base\Controller {
    public function indexAction()
    {
        echo 'Posts::index';
    }
    public function testAction()
    {
        debug($this->route);
        echo 'Posts::test';
    }
}