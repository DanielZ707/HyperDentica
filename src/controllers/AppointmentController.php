<?php

require_once 'AppController.php';
require_once __DIR__ . '/../models/Appointment.php';
require_once __DIR__ . '/../repository/AppointmentRepository.php';

class AppointmentController extends AppController
{
    private $message = [];
    private $appointmentRepository;

    public function __construct()
    {
        parent::__construct();
        $this->appointmentRepository = new AppointmentRepository();
    }

    public function appointmentsAdmin()
    {
        session_start();
        return $this->render('patientAppointmentsAdmin', ['user' => $_SESSION["id"],
            'appointments' => $this->appointmentRepository->getAppointments(),
            'messages' => $this->message]);
    }


    public function appointments()
    {
        session_start();
        if($_SESSION["id"]==5){
            return $this->render('patientAppointmentsAdmin', ['user' => $_SESSION["id"],
                'appointments' => $this->appointmentRepository->getAppointmentsByUserId($_SESSION["id"]),
                'messages' => $this->message]);
        }elseif ($_SESSION["id"]==4||$_SESSION["id"]==3||$_SESSION["id"]==2||$_SESSION["id"]==1){
            return $this->render('dentistAppointments', ['user' => $_SESSION["id"],
                'appointments' => $this->appointmentRepository->getAppointmentsByDentistId($_SESSION["id"]),
                'messages' => $this->message]);
        }else{
            return $this->render('patientAppointments', ['user' => $_SESSION["id"],
                'appointments' => $this->appointmentRepository->getAppointmentsByUserId($_SESSION["id"]),
                'messages' => $this->message]);
        }
    }


    public function addAppointment()
    {
        session_start();
        if ($this->isPost()) {
            $appointment = new Appointment($_POST['start_of_appointment'], $_POST['id_user_dentist'], $_POST['date_of_appointment'], $_POST['treatment'], $_POST['description']);
            $this->appointmentRepository->addAppointment($appointment);
            if($_SESSION["id"]==5){
                return $this->render('patientAppointmentsAdmin', ['user' => $_SESSION["id"],
                    'appointments' => $this->appointmentRepository->getAppointmentsByUserId($_SESSION["id"]),
                    'messages' => $this->message]);
            }else{
                return $this->render('patientAppointments', ['user' => $_SESSION["id"],
                    'appointments' => $this->appointmentRepository->getAppointmentsByUserId($_SESSION["id"]),
                    'messages' => $this->message]);
            }
        }
        return $this->render('addAppointment', ['messages' => $this->message]);
    }
    public function deleteAppointment()
    {
        session_start();
        return $this->render('patientAppointmentsAdmin', ['user' => $_SESSION["id"],
            'appointments' => $this->appointmentRepository->deleteAppointment(),
            'messages' => $this->message]);
    }

}