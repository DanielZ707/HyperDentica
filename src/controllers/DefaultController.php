<?php


require_once 'AppController.php';

class DefaultController extends AppController {

    public function login()
    {
        $this->render('login');
    }

    public function home()
    {
        session_start();
        if($_SESSION["id"]==5){
            $this->render('homeAdmin');
        }elseif ($_SESSION["id"]==1||$_SESSION["id"]==2||$_SESSION["id"]==3||$_SESSION["id"]==4){
            $this->render('homeDentist');
        }else{
            $this->render('home');
        }
    }
    public function dentist1()
    {
        $this->render('dentist1');
    }

    public function dentist2()
    {
        $this->render('dentist2');
    }

    public function dentist3()
    {
        $this->render('dentist3');
    }

    public function dentist4()
    {
        $this->render('dentist4');
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

    public function bridges()
    {
        $this->render('bridges');
    }
    public function canal()
    {
        $this->render('canal');
    }
    public function check()
    {
        $this->render('check');
    }
    public function damon()
    {
        $this->render('damon');
    }
    public function crowns()
    {
        $this->render('crowns');
    }
    public function fillings()
    {
        $this->render('fillings');
    }
    public function hygienist()
    {
        $this->render('hygienist');
    }
    public function implants()
    {
        $this->render('implants');
    }
    public function invisalign()
    {
        $this->render('invisalign');
    }

    public function whitening()
    {
        $this->render('whitening');
    }

    public function veneers()
    {
        $this->render('veneers');
    }
}