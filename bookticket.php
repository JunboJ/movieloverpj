<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php
        session_start();

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "movielover";
        $conn = mysqli_connect($servername, $username, $password, $dbname);

        $movieID = $_SESSION['movieID'];
        $userID = $_SESSION['userID'];

        $sessionid = $_REQUEST['ses'];
        $seats = $_REQUEST['sea'];

        $sql = ""
    ?>
</body>
</html>