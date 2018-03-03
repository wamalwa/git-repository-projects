<?php

if (isset($_POST['username']) && isset($_POST['password'])) {
    include 'config.php';

    $username = $_POST['username'];
    $password = $_POST['password'];

    $login = "SELECT con_id,con_name FROM contacts WHERE username='" . $username . "' AND password='" . $password . "'";

    $error = '';
    $execute = mysql_query($login) or die(mysql_error());
    $rows = mysql_num_rows($execute);
    $row = mysql_fetch_assoc($execute);


    if ($rows == 0) {

        $user = "Invalid Login details..Please try again!";
        header("location:http://localhost/semachat/index.php?error=". $user);
        mysql_close();
    } else {
        session_start();
        $error = '';
        $_SESSION['user_id'] = $row['con_id'];
        $_SESSION['user_name'] = $row['con_name'];
        $updatestatus = "UPDATE `contacts` SET `status_now`='Online'  WHERE `con_id`=" . $row['con_id'];

        if (mysql_query($updatestatus)) {
            header("location:http://localhost/semachat/chat.php");
        }
    }
}
?>
