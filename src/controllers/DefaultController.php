<?php


require_once 'AppController.php';

class DefaultController extends AppController {

    public function login()
    {
        $this->render('login');
    }

    public function menu()
    {
        $this->render('menu');
    }

    public function registration()
    {
        $this->render('registration');
    }

    public function treatments()
    {
        $this->render('treatments');
    }

    public function team()
    {
        $this->render('team');
    }

    public function prices()
    {
        $this->render('prices');
    }

    public function prices2()
    {
        $this->render('prices2');
    }

}