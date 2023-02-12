<!DOCTYPE html>

<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">

    <script src="https://kit.fontawesome.com/677e68d0e7.js" crossorigin="anonymous"></script>
    <title>PATIENT APPOINTMENTS ADMIN</title>
</head>

<body>
<div class="base-container">
    <nav>
        <a href="http://localhost:8080/home" class="button">Home</a>
        <img src="public/img/logo.svg">
        <i class="fa-solid fa-user-shield"></i>
    </nav>
    <main>
        <section class="appointments">
            <?php foreach ($appointments as $appointment): ?>
                <table border = "1" cellpadding = "5" cellspacing = "5" width="100%">
                    <tr>
                        <th>Date Of an Appointment</th>
                        <th>Treatment</th>
                        <th>Price</th>
                        <th>Start Of The Appointment</th>
                        <th>End Of The Appointment</th>
                        <th>Description</th>
                        <th>Day Of The Week</th>
                        <th>Dentist</th>
                        <th>Patient</th>
                        <th>Delete</th>
                    </tr>
                    <tr>
                        <td><?= $appointment->getDateOfAppointment(); ?></td>
                        <td><?= $appointment->getTreatment(); ?></td>
                        <td><?= $appointment->getPrice(); ?></td>
                        <td><?= $appointment->getStartOfAppointment(); ?></td>
                        <td><?= $appointment->getEndHourOfAppointment(); ?></td>
                        <td><?= $appointment->getDescription(); ?></td>
                        <td><?= $appointment->getDayOfTheWeek(); ?></td>
                        <td><?= $appointment->getTheDentistName(); ?></td>
                        <td><?= $appointment->getPatientName(); ?></td>
                        <td><a href="http://localhost:8080/deleteAppointment?id=<?php echo $appointment->getIdAppointment(); ?>" class="button"><i class="fa-solid fa-trash-can"></i></a></td>
                    </tr>
                </table>
            <?php endforeach; ?>
        </section>
    </main>
</div>
</body>