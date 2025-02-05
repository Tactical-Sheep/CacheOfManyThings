<?php

include "db_connect.php";  //connects to the database
session_start();  //starts a sessions which is needed to stay logged in

if(!$_SESSION["ssnlogin"]){  //if no login has been completed

    header("refresh:5;url=login.html");  //redirects them to login
    echo"You are not currently logged in, redirecting to login page";  //error message to reflect that
}else{
    echo "<!DOCTYPE html>  <!-- Declares doctype, important -->";

    echo "<html lang='en'>";
    echo "<head>";
    $usnm = $_SESSION['Username'];  //copies session name
    $userid = $_SESSION['userid'];  //copies session userid
    echo "<title>". $usnm. "'s profile page</title>";  //echoes title to the page
}


echo "</head>";
echo "<body>";



echo "Welcome ".$usnm. " To your profile page";  //welcome comment to the page

echo "<br><br>";
echo "Here is your data";


$sql = "SELECT * FROM mems WHERE Userid = ?";  //prepares sql to get details for logged in user


$stmt = $conn->prepare($sql);
$stmt->bindParam(1, $_SESSION["userid"]);
$stmt->bindParam(2, $act);
$stmt->bindParam(3, $logtime);

$stmt = $conn->prepare($sql); //prepares the sql

$stmt->bindParam(1,$userid);  //binds the parameters ready for execute

$stmt->execute();  // runs the query

$result = $stmt->fetch(PDO::FETCH_ASSOC);  //gets the result

//$sql = "SELECT date FROM activity WHERE Userid = ?";
//$stmt = $conn->prepare($sql);
//$stmt->bindParam(1, $_SESSION["userid"]);
//$stmt->execute();
//$date = $stmt->fetch(PDO::FETCH_ASSOC);
//echo"Last login was: ".$date['date'];

echo "<form method='post' action='upd.php'>";  //echos out start of the form

foreach($result as $key=>$value) {  //runs loop to go through each of the returned items

    if ($key == "Userid") {  // if its the userid data
        echo $key . ": " . $value . "<br>";  //echo out as text, not editable
    } elseif ($key == "signup") { //detects the sign up date
        echo $key . ": " . $value . "<br>";
    } elseif ($key != "Password") {  //if its the password data, don't output
        echo "<label for='" . $key . "'>" . $key . "</label>";  //produce label and form element using data in assoc array
        echo "<input type='text' name='" . $key . "' value='" . $value . "'><br>";

    }
}
    echo "<input type='submit'' value='Update'>";  //outputs button to allow update to be called
    echo "<li> <a href='passchange.html'>Update Password?</a></li>";

    $sql = "SELECT date FROM activity WHERE Userid = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(1, $_SESSION["userid"]);
    $stmt->execute();
    $date = $stmt->fetch(PDO::FETCH_ASSOC);
    echo "Last login was: " . $date['date'];

    $sql = "SELECT date FROM activity WHERE Userid = ? AND GROUP BY date - 1 ";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(1, $_SESSION["userid"]);
    $stmt->execute();
    $act = $stmt->fetch(PDO::FETCH_ASSOC);
    echo "Actions Completed:" . $date['date' - 1];


    $sql = "SELECT COUNT(activity) FROM activity WHERE Userid = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(1, $_SESSION["userid"]);
    $stmt->execute();
    $act = $stmt->fetch(PDO::FETCH_ASSOC);
    echo "Actions Completed Since Last Update: " . $act['COUNT(activity)'];

    echo "</body>";
    echo "</html>";


?>