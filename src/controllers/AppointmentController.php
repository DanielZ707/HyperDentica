<?php

require_once 'AppController.php';
require_once __DIR__ .'/../models/Appointment.php';
require_once __DIR__.'/../repository/AppointmentRepository.php';

class AppointmentController extends AppController
{
    private $message = [];
    private $appointmentRepository;

    public function __construct()
    {
        parent::__construct();
        $this->appointmentRepository = new AppointmentRepository();
    }

    public function addAppointment()
    {
        if ($this->isPost()) {

            $appointment = new Appointment($_POST['start_of_appointment'],$_POST['id_user_dentist'],$_POST['date_of_appointment'],$_POST['treatment'], $_POST['description']);
            $this->appointmentRepository->addAppointment($appointment);

            return $this->render('addAppointment', ['messages' => $this->message]);
        }
        return $this->render('addAppointment', ['messages' => $this->message]);
    }
}