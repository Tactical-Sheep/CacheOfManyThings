<?php
include "db_connect.php";

session_start();

$email = $_POST['email'];
$pswd = $_POST['Password'];

$sql = "SELECT * FROM mems WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bindParam(1, $email);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);
if($result) {
    $_SESSION["email"] = $email;
    $_SESSION["ssnlogin"] = true;
    $_SESSION["userid"] = $result["Userid"];
    $password = $result['Password'];

    session_set_cookie_params(1800);

  //  if (password_verify($pswd, $password)) {

  //      $act = "log";
  //      $logtime = time();

//        $sql = "INSERT INTO activity (Userid, activity, date) VALUES(?, ?, ?)";
//        $stmt = $conn->prepare($sql);
//        $stmt->bindParam(1, $_SESSION["userid"]);
//        $stmt->bindParam(2, $act);
//        $stmt->bindParam(3, $logtime);
//        $stmt->execute();

        header("Location: prof.php");
        echo "Valid User, Welcome Back, $email!<br>";
        exit();
    } else {
        session_destroy();
        echo "Incorrect Password";
    }


// <!-- try {
//    $act = "upd";
//  $logtime = time();

//    $sql = "INSERT INTO activity (userid, activity, date) VALUES ('$userid, $act, $logtime)";
//    $stmt = $conn->prepare($sql);
//}


//    $stmt->execute();

?>
</body>
</html>
