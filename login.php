<?php

include_once('connects.php');
include_once('Models.php');

$username = $_GET['username'];
$password = $_GET['password'];
	
$query_string = "SELECT * FROM account WHERE username = '$username' AND password = '$password'";
$result = mysqli_query($con, $query_string);

if (mysqli_num_rows($result) == 0) {
    echo "Incorrect Credentials";
} else  {
    $row = mysqli_fetch_array($result);
    $account = new Account(
        $row['username'],
        $row['name']
    );
    echo json_encode($account);
}

mysqli_close($con);

?>