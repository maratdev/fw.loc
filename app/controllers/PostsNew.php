<?php
namespace app\controllers;

/**
 * Created by PhpStorm.
 * User: marat
 * Date: 12.10.2018
 * Time: 22:02
 */
class PostsNew
{
    public function indexAction()
    {
        echo 'PostsNew::index';
    }
    public function testAction()
    {
        echo 'PostsNew::test';
    }
    public function testPageAction()
    {
        echo 'PostsNew::testPage';
    }
    public function before()
    {
        echo 'PostsNew::before';
    }
}