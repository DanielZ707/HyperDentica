<?php

class Appointment
{
    private $id_appointment;
    private $patientName;
    private $dateOfAppointment;

    private $treatment;
    private $price;
    private $start_of_appointment;
    private $endHourOfAppointment;
    private $description;
    private $dayOfTheWeek;
    private $id_user_dentist;
    private $id_user_patient;
    public function __construct($id_appointment,$id_user_patient,$start_of_appointment, $id_user_dentist, $dateOfAppointment, $treatment, $description)
    {
        $this->id_appointment = $id_appointment;
        $this->id_user_patient = $id_user_patient;
        $this->start_of_appointment = $start_of_appointment;
        $this->id_user_dentist = $id_user_dentist;
        $this->dateOfAppointment = $dateOfAppointment;
        $this->treatment = $treatment;
        $this->description = $description;
        switch ($this->getTreatment()) {
            case 'Child Dental Examination':
                $this->setPrice('30 €');
                $this->setEndHourOfAppointment(date('H:i', strtotime($this->getStartOfAppointment()) + 1800));
                break;
            case 'Routine Dental Examination':
                $this->setPrice('60 €');
                $this->setEndHourOfAppointment(date('H:i', strtotime($this->getStartOfAppointment()) + 1800));
                break;
            case 'Routine Hygiene Visit':
                $this->setPrice('80 €');
                $this->setEndHourOfAppointment(date('H:i', strtotime($this->getStartOfAppointment()) + 4500));
                break;
            case 'Extended Hygiene Visit':
                $this->setPrice('140 €');
                $this->setEndHourOfAppointment(date('H:i', strtotime($this->getStartOfAppointment()) + 6300));
                break;
            case 'Panoramic X-ray':
                $this->setPrice('65 €');
                $this->setEndHourOfAppointment(date('H:i', strtotime($this->getStartOfAppointment()) + 900));
                break;
            case 'Cone Beam CT Scan':
                $this->setPrice('265 €');
                $this->setEndHourOfAppointment(date('H:i', strtotime($this->getStartOfAppointment()) + 900));
                break;
            case 'Aesthetic White Fillings':
                $this->setPrice('120 €');
                $this->setEndHourOfAppointment(date('H:i', strtotime($this->getStartOfAppointment()) + 3600));
                break;
            case 'Temporary Fillings':
                $this->setPrice('50 €');
                $this->setEndHourOfAppointment(date('H:i', strtotime($this->getStartOfAppointment()) + 2700));
                break;
            case 'Routine Extraction':
                $this->setPrice('200 €');
                $this->setEndHourOfAppointment(date('H:i', strtotime($this->getStartOfAppointment()) + 3600));
                break;
            case 'Surgical Extraction':
                $this->setEndHourOfAppointment(date('H:i', strtotime($this->getStartOfAppointment()) + 7200));
                $this->setPrice('280 €');
                break;
            case 'Crown Bonded to Metal':
            case 'Porcelain Bridge':
                $this->setEndHourOfAppointment(date('H:i', strtotime($this->getStartOfAppointment()) + 3600));
                $this->setPrice('800 €');
                break;
            case 'Dental Implant and Crown':
                $this->setEndHourOfAppointment(date('H:i', strtotime($this->getStartOfAppointment()) + 7200));
                $this->setPrice('2800 €');
                break;
            case 'Implant Porcelain Crown Only':
                $this->setEndHourOfAppointment(date('H:i', strtotime($this->getStartOfAppointment()) + 3600));
                $this->setPrice('940 €');
                break;
            case 'Molar Teeth':
                $this->setEndHourOfAppointment(date('H:i', strtotime($this->getStartOfAppointment()) + 7200));
                $this->setPrice('700 €');
                break;
            case 'Sinus Lift':
                $this->setEndHourOfAppointment(date('H:i', strtotime($this->getStartOfAppointment()) + 9000));
                $this->setPrice('700 €');
                break;
            case 'Guided Bone Regeneration':
                $this->setEndHourOfAppointment(date('H:i', strtotime($this->getStartOfAppointment()) + 9000));
                $this->setPrice('530 €');
                break;
            case 'Full Ceramic':
                $this->setEndHourOfAppointment(date('H:i', strtotime($this->getStartOfAppointment()) + 9000));
                $this->setPrice('930 €');
                break;
            case 'In-Office Laser Whitening':
                $this->setEndHourOfAppointment(date('H:i', strtotime($this->getStartOfAppointment()) + 7200));
                $this->setPrice('550 €');
                break;
            case 'Socket Preservation':
                $this->setEndHourOfAppointment(date('H:i', strtotime($this->getStartOfAppointment()) + 3600));
                $this->setPrice('550 €');
                break;
            case 'Anterior Teeth':
                $this->setEndHourOfAppointment(date('H:i', strtotime($this->getStartOfAppointment()) + 5400));
                $this->setPrice('570 €');
                break;
            case 'Pre-Molar Teeth':
                $this->setEndHourOfAppointment(date('H:i', strtotime($this->getStartOfAppointment()) + 7200));
                $this->setPrice('620 €');
                break;
            case 'Damon Braces':
                $this->setEndHourOfAppointment(date('H:i', strtotime($this->getStartOfAppointment()) + 7200));
                $this->setPrice('2500 €');
                break;
            case 'Invisalign':
                $this->setEndHourOfAppointment(date('H:i', strtotime($this->getStartOfAppointment()) + 7200));
                $this->setPrice('2700 €');
                break;
            case 'Home Whitening Kit':
                $this->setEndHourOfAppointment(date('H:i', strtotime($this->getStartOfAppointment()) + 900));
                $this->setPrice('350 €');
                break;
        }

        $dayoftheweek = date('w', strtotime($this->getDateOfAppointment()));
        switch ($dayoftheweek) {
            case 1:
                $this->setDayOfTheWeek('Monday');
                break;
            case 2:
                $this->setDayOfTheWeek('Tuesday');
                break;
            case 3:
                $this->setDayOfTheWeek('Wednesday');
                break;
            case 4:
                $this->setDayOfTheWeek('Thursday');
                break;
            case 5:
                $this->setDayOfTheWeek('Friday');
                break;
        }
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

    public function getPatientName()
    {
        return $this->patientName;
    }

    public function setPatientName($patientName): void
    {
        $this->patientName = $patientName;
    }

    public function getIdUserPatient()
    {
        return $this->id_user_patient;
    }

    public function setIdUserPatient($id_user_patient): void
    {
        $this->id_user_patient = $id_user_patient;
    }

    public function getIdAppointment()
    {
        return $this->id_appointment;
    }

    public function setIdAppointment($id_appointment): void
    {
        $this->id_appointment = $id_appointment;
    }






    public function getTheDentistName()
    {
        if ($this->getIdUserDentist() == 1) {
            return 'Dr Katherine Chrystal';
        } elseif ($this->getIdUserDentist() == 2) {
            return 'Dr Laureen Patella';
        } elseif ($this->getIdUserDentist() == 3) {
            return 'Dr Daniel Walter';
        } elseif ($this->getIdUserDentist() == 4) {
            return 'Dr Peter Morgan';
        }
        return null;
    }


}