<?php

session_start();

include"db_connect.php";


$c_pass = $_POST['c_pass'];
$n_pass = $_POST['n_pass'];
$cn_pass = $_POST['cn_pass'];

$uid = $_SESSION["userid"];


$sql = "SELECT Password FROM mems WHERE uid = ?";
$stmt = $conn->prepare($sql);
$stmt->bindParam(1, $uid);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);

if (!password_verify($c_pass, $result['Password'])) {
    //$act = "apc";
    //$logtime = time();

    //$sql = "INSERT INTO activity (Userid, activity, date) VALUES(?, ?, ?)";
    //$stmt = $conn->prepare($sql);
    //$stmt->bindParam(1, $_SESSION["userid"]);
    //$stmt->bindParam(2, $act);
    //$stmt->bindParam(3, $logtime);
    //$stmt->execute();

    session_destroy();
    header("refresh:5, url=log.html");
    echo "Password Incorrect";
} elseif ($n_pass != $cn_pass) {
    header("refresh:5, url=passchange.html");
    echo "Passwords did not match";
} else {

   // $act = "spc";
   // $logtime = time();

   // $sql = "INSERT INTO activity (Userid, activity, date) VALUES(?, ?, ?)";
   // $stmt = $conn->prepare($sql);
   // $stmt->bindParam(1, $_SESSION["userid"]);
    //$stmt->bindParam(2, $act);
   // $stmt->bindParam(3, $logtime);
   // $stmt->execute();

    $hpswd = password_hash($n_pass, PASSWORD_DEFAULT);
    $sql = "UPDATE mems SET password=? WHERE uid = ?";
    $stmt = $conn->prepare($sql);

    $stmt->bindParam(1, $hpswd);
    $stmt->bindParam(2, $uid);
    $stmt->execute()
    ]
    header("Location: prof.php");
    echo "Password Changed, ".$_SESSION["Username"]."!<br>";
    //exit();
}





