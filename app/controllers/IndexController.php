<?php


namespace app\controllers;


use kernel\Controller;

/**
 * Class IndexController
 *
 * @package app\controllers
 */
class IndexController extends Controller
{
    public function index()
    {

    }

    /**
     * @param $id
     *
     * @return mixed
     */
    public function user($id)
    {
        return $this->render('test', ['test' => 'test-text', "id" => $id]);
    }
}
