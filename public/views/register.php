<!DOCTYPE html>

<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <script type="text/javascript" src="./public/js/script.js" defer></script>
    <title>REGISTER PAGE</title>
</head>

<body>
<div class="container-register">
    <div class="logoWithPrevious">
        <div class="logo">
            <img src="public/img/logo.svg">
        </div>
        <div class="prices-previous-button">
            <a href="http://localhost:8080/login" class="button">Previous Page</a>
        </div>
    </div>
    <div class="register-container">
        <form class="register"  action="register" method="POST">
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
            <input name="phone" type="text" placeholder="phone">
            <input name="password" type="password" placeholder="Password...">
            <input name="confirmedPassword" type="password" placeholder="Confirm password">
            <button type="submit">Register</button>
        </form>
    </div>
</div>
</body>