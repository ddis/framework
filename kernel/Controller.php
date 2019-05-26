<?php


namespace kernel;

/**
 * Class Controller
 *
 * @package kernel
 */
class Controller
{
    protected $view   = null;
    public    $layout = 'main';

    /**
     * Controller constructor.
     */
    public function __construct()
    {
        $this->view = new Template();
    }

    /**
     * @param $name
     * @param $data
     *
     * @return mixed
     */
    public function render($name, $data)
    {
        $content = $this->view->display($name, $data);

        return include_once "{$this->view->getTmplDir()}/layouts/{$this->layout}.php";
    }
}
