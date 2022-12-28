<!DOCTYPE html>

<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <title>REGISTRATION PAGE</title>
</head>

<body>
<div class="container">
    <div class="logo">
        <img src="public/img/logo.svg">
    </div>
    <div class="registration-container">
        <form class="registration" action="register" method="POST">
            <div class="messages">
                <?php
                if(isset($messages)){
                    foreach($messages as $message) {
                        echo $message;
                    }
                }
                ?>
            </div>
            <input name="name" type="text" placeholder="Name...">
            <input name="surname" type="text" placeholder="Surname...">
            <input name="email" type="text" placeholder="Email@...">
            <input name="password" type="password" placeholder="Password...">
            <button type="submit">Register</button>
        </form>
    </div>
</div>
</body>