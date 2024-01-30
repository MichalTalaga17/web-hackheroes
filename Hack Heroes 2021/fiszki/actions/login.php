<?php

require_once "./connect.php";

$connection = @new mysqli($host,$db_user,$db_password,$db_name);

$login_email = $_POST['login'];
$login_password = md5($_POST['password']);

$querry_result = mysqli_fetch_object($connection->query("SELECT * FROM uzytkownicy WHERE uzyt_email = '".$login_email."'"));
$querry_email = $querry_result->uzyt_email;
$querry_password = $querry_result->uzyt_haslo;

echo $login_email;
echo $querry_email;
echo $login_password;

if($querry_email!=$login_email){
    echo "błędny email";
    $_SESSION['login_error']="Błędne dane logowania!";
    header("Location: /login/");
}else if($querry_password!=$login_password){
    echo "błędne hasło";
    $_SESSION['login_error']="Błędne dane logowania!";
    header("Location: /login/");
}else if($querry_email==$login_email && $querry_password==$login_password){
    echo "poprawne dane logowania";
    $_SESSION['alert']="Poprawnie zalogowano";
    $_SESSION['log_session']= $querry_result->uzyt_id;
    header("Location: /panel/");
}



$connection->close();
?>
