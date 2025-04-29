<?php

session_start(); // passes all session variables into this page

include "db_connect.php"; //connects to the database


$uid = $_SESSION["uid"];
$date = $_POST["date"];
$tslot = $_POST["timeslot"];  //All variables that are posted through the html to be put into the database
$add1 = $_POST["address"];
$add2 = $_POST["address_L2"];
$town = $_POST["town"];
$county = $_POST["county"];
$pcode = $_POST["postcode"];


try {
    $sql = "INSERT INTO consults (uid, address_L1, address_L2, town, county, postcode, date_booked, timeslot) VALUES (?,?,?,?,?,?,?,?)";
    $stmt = $conn->prepare($sql2);

    $stmt->bindParam(1, $uid);
    $stmt->bindParam(2, $add1);
    $stmt->bindParam(3, $add2);   //This series of parameters takes all form elements and binds them to specific columns in the SQL database
    $stmt->bindParam(4, $town);
    $stmt->bindParam(5, $county);
    $stmt->bindParam(6, $pcode);
    $stmt->bindParam(7, $date);
    $stmt->bindParam(8, $tslot);

    $stmt2->execute();
    header("refresh:5; url=home.html");  //Takes the user back to the home page once the system is booked
    echo "Successfully Booked";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
