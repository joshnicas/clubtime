<?php
 if (isset($_POST['submit'])) {
require_once 'dbh.inc.php';


$email = $_POST['email'];
$username = $_POST['username'];
$pwd = $_POST['pwd'];
$pwd_confirmed = $_POST['confirm_pwd'];

if (empty($email) || empty($username) || empty($pwd) || empty($pwd_confirmed)) {
     header("location:../signup.php?signup=empty");
     exit();
}else{
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header("location:../signup.php?signup=email");
    exit();
}
else{
    $sql = "SELECT email FROM users WHERE email = :email;";
    $stmt = $pdo ->prepare($sql);
    $stmt ->bindParam(":email", $email);
    $stmt ->execute(['email' => $email]);
    $user = $stmt->fetch();

    

    if ($user) {
        if ($user['email'] === $email) {
            header("location:../signup.php?signup=user");
        }
    }else{
        echo "yess";
    }
    
   // header("location:../signup.php?success");
}
}


}else{

    header("location:../signup.php");
}
