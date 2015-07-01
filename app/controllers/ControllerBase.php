<?php
class ControllerBase extends \Phalcon\Mvc\Controller
{
    protected function display()
    {
        $this->view->reander();
    }
}
