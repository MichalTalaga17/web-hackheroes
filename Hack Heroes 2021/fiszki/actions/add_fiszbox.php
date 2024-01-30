<?php
require_once './connect.php';
$name = $_POST['name'];
$topic = $_POST['topic'];
if($_POST['topic1']=!" ") $topic=$_POST['topic1'];
if($topic=="Język") $ikona = 1;
else if($topic=="Historia") $ikona = 2;
else $ikona = 0; 
$connection->query("INSERT INTO `akcje_uzytkownikow` VALUES (NULL,'$user_id', 'Dodanie nowego zbioru fiszek', current_timestamp())");
$connection->query("INSERT INTO `zbiory_fiszek` (`ID`, `uzyt_ID`, `temat`, `ikona`, `nazwa`) VALUES (NULL, '$user_id', '$topic', '$ikona', '$name')");
header('Location: ../index.php');
?>