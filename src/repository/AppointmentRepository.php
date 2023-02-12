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
            $appointment['id'],
            $appointment['id_user_patient'],
            $appointment['start_of_appointment'],
            $appointment['id_user_dentist'],
            $appointment['date_of_appointment'],
            $appointment['treatment'],
            $appointment['description']
        );
    }


    public function getAppointments(): array
    {
        $results = [];

        $stmt = $this->database->connect()->prepare('
            SELECT * FROM appointments;
        ');
        $stmt->execute();
        $appointments = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($appointments as $appointment) {
            $results[] = new Appointment(
                $appointment['id'],
                $appointment['id_user_patient'],
                $appointment['start_of_appointment'],
                $appointment['id_user_dentist'],
                $appointment['date_of_appointment'],
                $appointment['treatment'],
                $appointment['description']
            );
        }
        foreach ($results as $result) {
            $stmt = $this->database->connect()->prepare('
            SELECT u.id, ud.surname FROM users u INNER JOIN users_details ud ON u.id_user_details = ud.id WHERE  u.id =:id;
        ');
            $id_patient = $result->getIdUserPatient();
            $stmt->bindParam(':id', $id_patient, PDO::PARAM_INT);
            $stmt->execute();
            $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $result->setPatientName($user[0]["surname"]);
        }

        return $results;
    }

    public function getAppointmentsByUserId(int $id): array
    {
        $result = [];

        $stmt = $this->database->connect()->prepare('
            SELECT * FROM appointments where id_user_patient =:id ;
        ');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $appointments = $stmt->fetchAll(PDO::FETCH_ASSOC);


        foreach ($appointments as $appointment) {
            $result[] = new Appointment(
                $appointment['id'],
                $appointment['id_user_patient'],
                $appointment['start_of_appointment'],
                $appointment['id_user_dentist'],
                $appointment['date_of_appointment'],
                $appointment['treatment'],
                $appointment['description']
            );
        }

        return $result;
    }

    public function getAppointmentsByDentistId(int $id): array
    {
        $results = [];

        $stmt = $this->database->connect()->prepare('
            SELECT * FROM appointments where id_user_dentist =:id ;
        ');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $appointments = $stmt->fetchAll(PDO::FETCH_ASSOC);


        foreach ($appointments as $appointment) {
            $results[] = new Appointment(
                $appointment['id'],
                $appointment['id_user_patient'],
                $appointment['start_of_appointment'],
                $appointment['id_user_dentist'],
                $appointment['date_of_appointment'],
                $appointment['treatment'],
                $appointment['description']
            );
        }
        foreach ($results as $result) {
            $stmt = $this->database->connect()->prepare('
            SELECT u.id, ud.surname FROM users u INNER JOIN users_details ud ON u.id_user_details = ud.id WHERE  u.id =:id;
        ');
            $id_patient = $result->getIdUserPatient();
            $stmt->bindParam(':id', $id_patient, PDO::PARAM_INT);
            $stmt->execute();
            $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $result->setPatientName($user[0]["surname"]);
        }
        return $results;
    }


    public function addAppointment(Appointment $appointment): void
    {
        $stmt = $this->database->connect()->prepare('
            INSERT INTO appointments (date_of_appointment, treatment, price, start_of_appointment,end_of_appointment,description,day_of_week, id_user_dentist, id_user_patient)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)
        ');

        if ($appointment->getDescription() == '') {
            $appointment->setDescription('No Description');
        }
        $appointment->setIdUserPatient($_SESSION["id"]);
        $stmt->execute([
            $appointment->getDateOfAppointment(),
            $appointment->getTreatment(),
            $appointment->getPrice(),
            $appointment->getStartOfAppointment(),
            $appointment->getEndHourOfAppointment(),
            $appointment->getDescription(),
            $appointment->getDayOfTheWeek(),
            $appointment->getIdUserDentist(),
            $appointment->getIdUserPatient()
        ]);
    }
    public function deleteAppointment(): array
    {
        $id = $_GET['id'];
        $stmt = $this->database->connect()->prepare('
            DELETE FROM appointments WHERE id =:id;
        ');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $results = [];

        $stmt = $this->database->connect()->prepare('
            SELECT * FROM appointments;
        ');
        $stmt->execute();
        $appointments = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($appointments as $appointment) {
            $results[] = new Appointment(
                $appointment['id'],
                $appointment['id_user_patient'],
                $appointment['start_of_appointment'],
                $appointment['id_user_dentist'],
                $appointment['date_of_appointment'],
                $appointment['treatment'],
                $appointment['description']
            );
        }
        foreach ($results as $result) {
            $stmt = $this->database->connect()->prepare('
            SELECT u.id, ud.surname FROM users u INNER JOIN users_details ud ON u.id_user_details = ud.id WHERE  u.id =:id;
        ');
            $id_patient = $result->getIdUserPatient();
            $stmt->bindParam(':id', $id_patient, PDO::PARAM_INT);
            $stmt->execute();
            $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $result->setPatientName($user[0]["surname"]);
        }

        return $results;
    }

}
