<?php
use Johnoye742\Asher\Session;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <h1>You are logged in as <span id="username"></span></h1>

    <a href="/logout">Logout</a>

    <script>
        document.getElementById('username').innerHTML = <?php echo Session::getSession() ?>['username']
    </script>
</body>
</html>