<?php

$from_name = 'ml';
$from_email = 'movielover.jar@gmail.com';
$headers = 'From: $from_name <$from_email>';
$body = 'This is a test email';
$subject = 'test email from php mail()';
$to = 'junboz598@gmail.com';
if (mail($to, $subject, $body, $headers)) {
    echo "success!";
}else{
    echo "fail...";
}

?>