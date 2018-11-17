<?php
/**
 * Created by PhpStorm.
 * User: marat
 * Date: 28.10.2018
 * Time: 21:59
 */

namespace app\controllers;


class Page extends \vendor\core\base\Controller
{
    public function viewAction()
    {
        debug($this->route);
        debug($_GET);
        echo $_GET['page'];
        echo 'Page::view';
    }
}