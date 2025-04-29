<?php
include "db_connect.php";

session_start();

$email = $_POST['con_email'];
$pswd = $_POST['con_password'];

$sql = "SELECT * FROM employees WHERE con_email = ?";
$stmt = $conn->prepare($sql);
$stmt->bindParam(1, $email);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);
if($result) {
    $_SESSION["con_email"] = $email;
    $_SESSION["ssnlogin"] = true;
    $_SESSION["userid"] = $result["Userid"];
    $password = $result['password'];

    session_set_cookie_params(1800);

    if (password_verify($pswd, $password)) {

        header("Location: home.html");
        echo "Valid User, Welcome Back, $email!<br>";
        exit();
    } else {
        session_destroy();
        echo "Incorrect Password";
    }
}


?>
</body>
</html>
