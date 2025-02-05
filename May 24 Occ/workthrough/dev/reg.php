<?php

include "db_connect.php";

$usnm = $_POST["Username"];
$pswd = $_POST["Password"];
$fname = $_POST["Fname"];
$sname = $_POST["Sname"];
$email = $_POST["Email"];
$signupdate = date("Y-m-d");

try {

  $hpswd = password_hash($pswd, PASSWORD_DEFAULT);
  $sql = "INSERT INTO mems (Username, Password, Fname, Sname, Email, signup) VALUES (?,?,?,?,?,?)";
  $stmt = $conn->prepare($sql);

  $stmt->bindParam(1, $usnm);
  $stmt->bindParam(2, $hpswd);
  $stmt->bindParam(3, $fname);
  $stmt->bindParam(4, $sname);
  $stmt->bindParam(5, $email);
  $stmt->bindParam(6, $signupdate);

  $stmt->execute();
  header("refresh:5; url=prof.html");
  echo "Successfully Registered!";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
  ?>