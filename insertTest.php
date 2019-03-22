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
        include 'connection.php';
        $mid = 4;
        $postername = 'thelionking_poster.jpg';
        $rd = '2019-04-12';
        $description = 'Get ready for all the nostalgia as we compare the trailer for the new CGI re-imagining of The Lion King to scenes from the original movie you know and love.';

        $release_sql = "UPDATE movies
                    SET releasedate =  '$rd'
                    WHERE movieID = $mid";

        $poster_sql = "UPDATE movies
                SET poster =  '$postername'
                WHERE movieID = $mid";

        
        $description_sql = "UPDATE movies
                        SET description =  '$description'
                        WHERE movieID = $mid";

        if ($conn->query($release_sql) === TRUE) {
            echo "realease date updated successfully";
        } else {
            echo "Error: " . $release_sql . "<br>" . $conn->error;
        }
        echo "<br>";
        if ($conn->query($poster_sql) === TRUE) {
            echo "poster_sql updated successfully";
        } else {
            echo "Error: " . $poster_sql . "<br>" . $conn->error;
        }
        echo "<br>";
        if ($conn->query($description_sql) === TRUE) {
            echo "description_sql updated successfully";
        } else {
            echo "Error: " . $description_sql . "<br>" . $conn->error;
        }
        echo "<br>";
        $conn->close();
    ?>
</body>
</html>