<?php

include "db_connect.php";

$email = $_POST["email"]; // All information given in the index HTML is then sent to this PHP file
$pswd = $_POST["password"];
$fname = $_POST["f_name"];
$sname = $_POST["s_name"];
$signupdate = date("Y-m-d");
$phone_num = $_POST["phonenum"];




try {

  $hpswd = password_hash($pswd, PASSWORD_DEFAULT);
  $sql = "INSERT INTO users (email, password, f_name, s_name, signupdate, phone_num) VALUES (?,?,?,?,?,?)"; // This statement takes the details posted from the HTML and places them in the database
  $stmt = $conn->prepare($sql);

  $stmt->bindParam(1, $email);
  $stmt->bindParam(2, $hpswd);   //This series of parameters takes all form elements and binds them to specific columns in the SQL database
  $stmt->bindParam(3, $fname);
  $stmt->bindParam(4, $sname);
  $stmt->bindParam(5, $signupdate);
  $stmt->bindParam(6, $phone_num);


  $stmt->execute();
  header("refresh:5; url=home.html");
  echo "Successfully Registered!";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
  ?>