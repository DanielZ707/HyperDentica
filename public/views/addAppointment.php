<!DOCTYPE html>

<head>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
    <script src="https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
    <script src="https://kit.fontawesome.com/677e68d0e7.js" crossorigin="anonymous"></script>
    <script>
        $(function () {
            $("#datepicker-1").datepicker({beforeShowDay: $.datepicker.noWeekends, minDate: 0, dateFormat: 'dd-mm-yy'});
            $('#timepicker').timepicker({
                timeFormat: 'HH:mm',
                interval: 15,
                minTime: '8',
                maxTime: '17',
                startTime: '8',
                dynamic: false,
                dropdown: true,
                scrollbar: true
            });
        });
    </script>
    <title>APPOINTMENT PAGE</title>
</head>

<body>
<div>
    <div>
        <div class="container">
            <div class="logoWithPrevious">
                <div class="logo">
                    <img src="public/img/logo.svg">
                </div>
                <div class="prices-previous-button">
                    <a href="http://localhost:8080/home" class="button">Previous Page</a>
                </div>
            </div>
            <div class="registration-container">
                <form class=addAppointment action="addAppointment" method="POST" ENCTYPE="multipart/form-data">
                    <div class="messages">
                        <?php
                        if (isset($messages)) {
                            foreach ($messages as $message) {
                                echo $message;
                            }
                        }
                        ?>
                    </div>
                    <div class="dentists">
                        <label for="id_user_dentist">Choose a Dentist: </label><select name="id_user_dentist" id="id_user_dentist">
                            <option value="1">Dr Katherine Chrystal</option>
                            <option value="2">Dr Laureen Patella</option>
                            <option value="3">Dr Daniel Walter</option>
                            <option value="4">Dr Peter Morgan</option>
                        </select>
                    </div>
                    <div class="treatments">
                        <label for="treatment">Choose a treatment: </label><select name="treatment" id="treatment">
                            <optgroup label="Dental Examinations">
                                <option value="Routine dental Examination">Routine Dental Examination 60.00€</option>
                                <option value="Child Dental Examination">Child Dental Examination 30.00€</option>
                            </optgroup>
                            <optgroup label="Hygienist">
                                <option value="Routine Hygiene Visit">Routine Hygiene Visit 80.00€</option>
                                <option value="Extended Hygiene Visit">Extended Hygiene Visit 140.00€</option>
                            </optgroup>
                            <optgroup label="X-rays">
                                <option value="Panoramic X-ray">Panoramic X-ray 65.00€</option>
                                <option value="Cone Beam CT Scan">Cone Beam CT Scan 265.00€</option>
                            </optgroup>
                            <optgroup label="Composite Fillings">
                                <option value="Aesthetic White Fillings">Aesthetic White Fillings 120.00€</option>
                                <option value="Temporary Fillings">Temporary Fillings 50.00€</option>
                            </optgroup>
                            <optgroup label="Teeth Extraction">
                                <option value="Routine Extraction">Routine Extraction 200.00€</option>
                                <option value="Surgical Extraction">Surgical Extraction 280.00€</option>
                            </optgroup>
                            <optgroup label="Bridges">
                                <option value="Porcelain Bridge">Porcelain Bridge 800.00€</option>
                            </optgroup>
                            <optgroup label="Implants">
                                <option value="Dental Implant and Crown">Dental Implant and Crown 2800.00€</option>
                                <option value="Implant Porcelain Crown Only">Implant Porcelain Crown Only 940.00€
                                </option>
                                <option value="Sinus Lift">Sinus Lift 700.00€</option>
                                <option value="Guided Bone Regeneration">Guided Bone Regeneration 530.00€</option>
                            </optgroup>
                            <optgroup label="Crowns, Inlays and Veneers">
                                <option value="Crown Bonded to Metal">Crown Bonded to Metal 800.00€</option>
                                <option value="Full Ceramic">Full Ceramic 930.00€</option>
                                <option value="Socket Preservation">Socket Preservation 550.00€</option>
                            </optgroup>
                            <optgroup label="Root Canal Treatment">
                                <option value="Anterior Teeth">Anterior Teeth 570.00€</option>
                                <option value="Pre-Molar Teeth">Pre-Molar Teeth 620.00€</option>
                                <option value="Molar Teeth">Molar Teeth 700.00€</option>
                            </optgroup>
                            <optgroup label="Braces">
                                <option value="Damon Braces">Damon Braces 2500.00€</option>
                                <option value="Invisalign">Invisalign 2700.00€</option>
                            </optgroup>
                            <optgroup label="Teeth Whitening">
                                <option value="Home Whitening Kit">Home Whitening Kit 350.00€</option>
                                <option value="In-Office Laser Whitening">In-Office Laser Whitening 550.00€</option>
                            </optgroup>
                        </select>
                    </div>
                    <div class="ui-1">
                        <label for="date_of_appointment">Appointment Date:</label>
                        <input autocomplete="off" type="text" id="datepicker-1" name="date_of_appointment" required>
                    </div>
                    <div class="ui-2">
                        <label for="start_of_appointment">Appointment Time:</label>
                        <input autocomplete="off" type="text" id="timepicker" name="start_of_appointment" required>
                    </div>
                    <div class="description-class">
                        <label for="description">Description:</label>
                        <label>
                            <textarea name="description" rows=5 cols=50 placeholder="description"></textarea>
                        </label>
                    </div>
                    <button type="submit">Send</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>