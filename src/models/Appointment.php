<?php

class Appointment
{
    private $dateOfAppointment;

    private $treatment;
    private $price;
    private $start_of_appointment;
    private $endHourOfAppointment;
    private $description;
    private $dayOfTheWeek;

    private $id_user_dentist;

    public function __construct($start_of_appointment, $id_user_dentist,$dateOfAppointment,$treatment, $description)
    {
        $this->start_of_appointment=$start_of_appointment;
        $this->id_user_dentist=$id_user_dentist;
        $this->dateOfAppointment=$dateOfAppointment;
        $this->treatment = $treatment;
        $this->description = $description;
    }

    public function getIdUserDentist()
    {
        return $this->id_user_dentist;
    }

    public function setIdUserDentist($id_user_dentist): void
    {
        $this->id_user_dentist = $id_user_dentist;
    }



    public function getDateOfAppointment()
    {
        return $this->dateOfAppointment;
    }

    public function setDateOfAppointment($dateOfAppointment): void
    {
        $this->dateOfAppointment = $dateOfAppointment;
    }



    public function getTreatment()
    {
        return $this->treatment;
    }
    public function setTreatment($treatment): void
    {
        $this->treatment = $treatment;
    }
    public function getPrice()
    {
        return $this->price;
    }
    public function setPrice($price): void
    {
        $this->price = $price;
    }

    public function getStartOfAppointment()
    {
        return $this->start_of_appointment;
    }

    public function setStartOfAppointment($start_of_appointment): void
    {
        $this->start_of_appointment = $start_of_appointment;
    }

    public function getEndHourOfAppointment()
    {
        return $this->endHourOfAppointment;
    }
    public function setEndHourOfAppointment($endHourOfAppointment): void
    {
        $this->endHourOfAppointment = $endHourOfAppointment;
    }
    public function getDescription()
    {
        return $this->description;
    }
    public function setDescription($description): void
    {
        $this->description = $description;
    }
    public function getDayOfTheWeek()
    {
        return $this->dayOfTheWeek;
    }
    public function setDayOfTheWeek($dayOfTheWeek): void
    {
        $this->dayOfTheWeek = $dayOfTheWeek;
    }




}