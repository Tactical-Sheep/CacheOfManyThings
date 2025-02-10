<?php

include "db_connect.php";

$uid = $_POST["uid"];
$email = $_POST["email"];
$pswd = $_POST["password"];
$phonenum = $_POST["phonenum"];
$acctype = $_POST["acc_type"];

try {

  $hpswd = password_hash($pswd, PASSWORD_DEFAULT);
  $sql = "INSERT INTO user (uid, email, password, phonenum, acc_type) VALUES (?,?,?,?,?)";
  $stmt = $conn->prepare($sql);

  $stmt->bindParam(1, $uid);
  $stmt->bindParam(2, $email);
  $stmt->bindParam(3, $hpswd);
  $stmt->bindParam(4, $phonenum);
  $stmt->bindParam(5, $acc_type);

  $stmt->execute();
  header("refresh:5; url=prof.html");
  echo "Successfully Registered!";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
  ?>