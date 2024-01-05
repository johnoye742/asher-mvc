<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <h1>You are logged in as a <?php echo isset($_SESSION['current_user']) ?></h1>

    <a href="/logout">Logout</a>

    <script>
        console.log("<?php $_SESSION['current_user'] ?>");
    </script>
</body>
</html>