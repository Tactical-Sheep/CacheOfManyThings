<?php
session_start(); //connects to the session data

include "db_connect.php";  // connects to the database

$usnm = $_POST['Username'];  // pulls data from posted form
$fname = $_POST['Fname']; // pulls data from posted form
$sname = $_POST['Sname']; // pulls data from posted form
$email = $_POST['Email']; // pulls data from posted form

$userid = $_SESSION["userid"]; //pulls data from session variable
$susnm = $_SESSION["Username"]; //pulls the current username from session variables

try {  // attempts this code
    if ($susnm!=$usnm) { //if the username stored and typed dont match then do this
        $sql = "SELECT * FROM mems WHERE Username = ?";  // Selects usernames from database that match entered
        $stmt = $conn->prepare($sql);  //perpares the statement
        $stmt->bindParam(1, $usnm);  // secures this parameters, good coding method
        $stmt->execute();  //executes the code

        $result = $stmt->fetch(PDO::FETCH_ASSOC);  //fetches the result

        if ($result) {  //if there is a result
            header("refresh:5; url=prof.php");  //error message and redirect
            echo "Usernames Exists, try another name";
            exit();  // this was needed as below code still executed... which is bad
        }
    }

    $sql = "UPDATE mems SET Username=?, Fname=?, Sname=?, Email=? WHERE Userid = ?";  //sets up the statement
    $stmt = $conn->prepare($sql);  //prepares it
    $stmt->bindParam(1,$usnm);  //binding all the parameters
    $stmt->bindParam(2,$fname);
    $stmt->bindParam(3,$sname);
    $stmt->bindParam(4,$email);
    $stmt->bindParam(5,$userid);
    $stmt->execute();  //execute the code
    $_SESSION["uname"]=$usnm;  //update session variable


    // update the activity table to reflect updating details

    try {
        $act = "upd";
        $logtime = time();

        $sql = "INSERT INTO activity (Userid, activity, date) VALUES (?, ?, ?)";  //prepare the sql to be sent
        $stmt = $conn->prepare($sql); //prepare to sql

        $stmt->bindParam(1, $userid);  //bind parameters for security
        $stmt->bindParam(2, $act);
        $stmt->bindParam(3, $logtime);

        $stmt->execute();  //run the query to insert
        header("refresh:5; url=prof.php");  //redirect with confirmation message
        echo "Details updated successfully";
    } catch (Exception $e) {
        echo $e->getMessage();
    }




} catch(PDOException $e){   //catch error if one occurs
    header("refresh:5; url=prof.php");
    echo $e->getMessage();

}

?>