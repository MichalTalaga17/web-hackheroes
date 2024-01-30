<?php
session_start();
    $host = "localhost";
    $db_user = "HH";
    $db_password ="HackHeroes";
    $db_name ="hackheroesdb";

    $connection = @new mysqli($host,$db_user,$db_password,$db_name);
    if(isset($_SESSION['log_session'])){
        @$querry_result = mysqli_fetch_object($connection->query("SELECT * FROM uzytkownicy where uzyt_id = '".$_SESSION['log_session']."'"));
        @$username = $querry_result->uzyt_nazwa;
        @$user_id = $querry_result->uzyt_id;
        @$user_permissions = $querry_result->uzyt_ranga;
        @$user_email = $querry_result->uzyt_email;
    }

    
?>
