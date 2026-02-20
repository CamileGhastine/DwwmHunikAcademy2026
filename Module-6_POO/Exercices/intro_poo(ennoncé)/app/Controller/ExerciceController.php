<?php

require 'Controller.php';

class ExerciceController extends Controller
{
    private $viewRepertory = 'exercice/';

    public function home(): void
    {
        $this->render($this->viewRepertory . 'home', []);
    }

    public function exercice()
    {
        $this->render($this->viewRepertory . 'exercice' . substr($_GET['page'], 2), []);
    }

    public function end()
    {
        $this->render($this->viewRepertory . 'end', []);
    }
}
