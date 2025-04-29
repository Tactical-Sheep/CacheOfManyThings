<?php
include "db_connect.php";

session_start();

$fname = $_POST["fname"];
$sname = $_POST["sname"];
$email = $_POST['email'];
$pswd = $_POST['password'];

$sql = "SELECT * FROM user WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bindParam(1, $email);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);
if($result) {
    $_SESSION["fname"] = $fname;
    $_SESSION["sname"] = $sname;
    $_SESSION["email"] = $email;
    $_SESSION["ssnlogin"] = true;
    $_SESSION["uid"] = $result["uid"];
    $password = $result['password'];

    session_set_cookie_params(1800);

    if (password_verify($pswd, $password)) {

        header("Location: home.html");
        echo "Valid User, Welcome Back, $fname!<br>";
        exit();
    } else {
        session_destroy();
        echo "Incorrect Password";
    }
}


?>

