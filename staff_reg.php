<?php

include "db_connect.php";

$fname = $_POST["con_fname"];
$sname = $_POST["con_sname"];
$email = $_POST["con_email"]; // All information given in the index HTML is then sent to this PHP file
$pswd = $_POST["con_password"];
$signupdate = date("Y-m-d");



try {

    $hpswd = password_hash($pswd, PASSWORD_DEFAULT);
    $sql = "INSERT INTO employees (con_fname, con_sname, con_email, con_password) VALUES (?,?,?,?)"; // This statement takes the details posted from the HTML and places them in the database
    $stmt = $conn->prepare($sql);

    $stmt->bindParam(1, $fname);
    $stmt->bindParam(2, $sname);   //This series of parameters takes all form elements and binds them to specific columns in the SQL database
    $stmt->bindParam(3, $email);
    $stmt->bindParam(4, $hpswd);

    $stmt->execute();
    header("refresh:5; url=home.html");
    echo "Successfully Registered!";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
