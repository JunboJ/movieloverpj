<?php
    session_start();

    $userid = $_SESSION['userID'];
    $movieid = $_SESSION['movieID'];

    include ('connection.php');

    $session = $_REQUEST['seid'];
    $seats = $_REQUEST['seat'];

//add this order to tickets_order table
    $sql = "INSERT INTO tickets_order (movieID, sessionID, userID, seats) VALUES ($movieid, $session, $userid, $seats)";
    $order_res = mysqli_query($conn, $sql);

    if ($order_res === TRUE) {
        echo "order placed successfully";
        sendnotification();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

//send email function
    $getemail_sql = "SELECT email FROM userprofile WHERE UserID = $userid";
    $email_res = mysqli_query($conn, $getemail_sql);
    $email = mysqli_fetch_all($email_res);

    function sendnotification () {
        $email = $GLOBALS['email'];

        $from_name = 'Movie Lover';
        $from_email = 'movielover.jar@gmail.com';
        $headers = 'From: '.$from_name.' <'.$from_email.'>';
        $body = 'Hi, user'.'';
        $subject = 'Your order has been placed successfully!';
        $to = $email;
        if (mail($to, $subject, $body, $headers)) {
            echo "success!";
        }else{
            echo "fail...";
        }
    }

//update seats info in dummy table
    //get current seats in dummy table
    $dummy_seats = "SELECT seats FROM dummytb1 WHERE sessionID = $session";
    $ds_rs = mysqli_query($conn, $dummy_seats);
    $ds = mysqli_fetch_all($ds_rs);

    echo $ds[0][0];

    //calculate new seats
    $latestSeats = $ds[0][0] - $seats;

    //update dummy table
    $seats_sql = "UPDATE dummytb1 SET seats = $latestSeats WHERE sessionID = $session";
    $dummyseats_res = mysqli_query($conn, $seats_sql);

    // if ($dummyseats_res === TRUE) {
    //     echo "dummy seats info updated successfully";
    // } else {
    //     echo "Error: " . $seats_sql . "<br>" . $conn->error;
    // }
?>