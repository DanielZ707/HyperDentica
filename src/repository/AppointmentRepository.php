<?php


require_once 'Repository.php';
require_once __DIR__ . '/../models/Appointment.php';

class AppointmentRepository extends Repository
{

    public function getAppointment(int $id): ?Appointment
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.appointments WHERE id = :id
        ');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $appointment = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$appointment) {
            return null;
        }

        return new Appointment(
            $appointment['treatment'],
            $appointment['description']
        );
    }


    public function addAppointment(Appointment $appointment): void
    {
        $stmt = $this->database->connect()->prepare('
            INSERT INTO appointments (date_of_appointment, treatment, price, start_of_appointment,end_of_appointment,description,day_of_week, id_user_dentist, id_user_patient)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)
        ');

        switch ($appointment->getTreatment()) {
            case 'Child Dental Examination':
                $appointment->setPrice(30);
                $appointment->setEndHourOfAppointment(date('H:i', strtotime($appointment->getStartOfAppointment()) + 1800));
                break;
            case 'Routine dental Examination':
                $appointment->setPrice(60);
                $appointment->setEndHourOfAppointment(date('H:i', strtotime($appointment->getStartOfAppointment()) + 1800));
                break;
            case 'Routine Hygiene Visit':
                $appointment->setPrice(80);
                $appointment->setEndHourOfAppointment(date('H:i', strtotime($appointment->getStartOfAppointment()) + 4500));
                break;
            case 'Extended Hygiene Visit':
                $appointment->setPrice(140);
                $appointment->setEndHourOfAppointment(date('H:i', strtotime($appointment->getStartOfAppointment()) + 6300));
                break;
            case 'Panoramic X-ray':
                $appointment->setPrice(65);
                $appointment->setEndHourOfAppointment(date('H:i', strtotime($appointment->getStartOfAppointment()) + 900));
                break;
            case 'Cone Beam CT Scan':
                $appointment->setPrice(265);
                $appointment->setEndHourOfAppointment(date('H:i', strtotime($appointment->getStartOfAppointment()) + 900));
                break;
            case 'Aesthetic White Fillings':
                $appointment->setPrice(120);
                $appointment->setEndHourOfAppointment(date('H:i', strtotime($appointment->getStartOfAppointment()) + 3600));
                break;
            case 'Temporary Fillings':
                $appointment->setPrice(50);
                $appointment->setEndHourOfAppointment(date('H:i', strtotime($appointment->getStartOfAppointment()) + 2700));
                break;
            case 'Routine Extraction':
                $appointment->setPrice(200);
                $appointment->setEndHourOfAppointment(date('H:i', strtotime($appointment->getStartOfAppointment()) + 3600));
                break;
            case 'Surgical Extraction':
                $appointment->setEndHourOfAppointment(date('H:i', strtotime($appointment->getStartOfAppointment()) + 7200));
                $appointment->setPrice(280);
                break;
            case 'Crown Bonded to Metal':
            case 'Porcelain Bridge':
                $appointment->setEndHourOfAppointment(date('H:i', strtotime($appointment->getStartOfAppointment()) + 3600));
                $appointment->setPrice(800);
                break;
            case 'Dental Implant and Crown':
                $appointment->setEndHourOfAppointment(date('H:i', strtotime($appointment->getStartOfAppointment()) + 7200));
                $appointment->setPrice(2800);
                break;
            case 'Implant Porcelain Crown Only':
                $appointment->setEndHourOfAppointment(date('H:i', strtotime($appointment->getStartOfAppointment()) + 3600));
                $appointment->setPrice(940);
                break;
            case 'Molar Teeth':
                $appointment->setEndHourOfAppointment(date('H:i', strtotime($appointment->getStartOfAppointment()) + 7200));
                $appointment->setPrice(700);
                break;
            case 'Sinus Lift':
                $appointment->setEndHourOfAppointment(date('H:i', strtotime($appointment->getStartOfAppointment()) + 9000));
                $appointment->setPrice(700);
                break;
            case 'Guided Bone Regeneration':
                $appointment->setEndHourOfAppointment(date('H:i', strtotime($appointment->getStartOfAppointment()) + 9000));
                $appointment->setPrice(530);
                break;
            case 'Full Ceramic':
                $appointment->setEndHourOfAppointment(date('H:i', strtotime($appointment->getStartOfAppointment()) + 9000));
                $appointment->setPrice(930);
                break;
            case 'In-Office Laser Whitening':
                $appointment->setEndHourOfAppointment(date('H:i', strtotime($appointment->getStartOfAppointment()) + 7200));
                $appointment->setPrice(550);
                break;
            case 'Socket Preservation':
                $appointment->setEndHourOfAppointment(date('H:i', strtotime($appointment->getStartOfAppointment()) + 3600));
                $appointment->setPrice(550);
                break;
            case 'Anterior Teeth':
                $appointment->setEndHourOfAppointment(date('H:i', strtotime($appointment->getStartOfAppointment()) + 5400));
                $appointment->setPrice(570);
                break;
            case 'Pre-Molar Teeth':
                $appointment->setEndHourOfAppointment(date('H:i', strtotime($appointment->getStartOfAppointment()) + 7200));
                $appointment->setPrice(620);
                break;
            case 'Damon Braces':
                $appointment->setEndHourOfAppointment(date('H:i', strtotime($appointment->getStartOfAppointment()) + 7200));
                $appointment->setPrice(2500);
                break;
            case 'Invisalign':
                $appointment->setEndHourOfAppointment(date('H:i', strtotime($appointment->getStartOfAppointment()) + 7200));
                $appointment->setPrice(2700);
                break;
            case 'Home Whitening Kit':
                $appointment->setEndHourOfAppointment(date('H:i', strtotime($appointment->getStartOfAppointment()) + 900));
                $appointment->setPrice(350);
                break;
        }

        //TODO you should get this value from logged user session
        $id_user_patient = 5;
        $dayoftheweek = date('w', strtotime($appointment->getDateOfAppointment()));
        switch ($dayoftheweek){
            case 1:
                $appointment->setDayOfTheWeek('Monday');
                break;
            case 2:
                $appointment->setDayOfTheWeek('Tuesday');
                break;
            case 3:
                $appointment->setDayOfTheWeek('Wednesday');
                break;
            case 4:
                $appointment->setDayOfTheWeek('Thursday');
                break;
            case 5:
                $appointment->setDayOfTheWeek('Friday');
                break;
        }

        $stmt->execute([
            $appointment->getDateOfAppointment(),
            $appointment->getTreatment(),
            $appointment->getPrice(),
            $appointment->getStartOfAppointment(),
            $appointment->getEndHourOfAppointment(),
            $appointment->getDescription(),
            $appointment->getDayOfTheWeek(),
            $appointment->getIdUserDentist(),
            $id_user_patient
        ]);
    }
}
