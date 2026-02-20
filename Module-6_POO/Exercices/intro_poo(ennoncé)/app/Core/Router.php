<?php

class router
{
    private $path;

    public function __construct()
    {
        $this->path = dirname(__DIR__);
    }

    public function run()
    {
        try {
            $page = isset($_GET['page']) ? $_GET['page'] : 'home';

            if ($page === 'home') {
                require $this->path . '/Controller/ExerciceController.php';
                $exerciceController = new ExerciceController();
                $exerciceController->home();
            } elseif (substr($page, 0, -1) === 'ex') {
                require $this->path . '/Controller/ExerciceController.php';
                $exerciceController = new ExerciceController();
                $exerciceController->exercice();
            } elseif (substr($page, 0, -1) === 'test') {
                require $this->path . '/Controller/TestController.php';
                $testController = new TestController();
                $testController->test();
            } elseif ($page === 'end') {
                require $this->path . '/Controller/ExerciceController.php';
                $exerciceController = new ExerciceController();
                $exerciceController->end();
            } else {
                throw new Exception('404');
            }
        } catch (Exception $e) {
            require $this->path . '/Controller/ErrorController.php';
            $errorController = new ErrorController();
            $errorController->error($e);
        }
    }
}
