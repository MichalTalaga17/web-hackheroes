<?php
require_once './connect.php';
if(isset($_GET['row_ID'])){
    $post_ID = $_GET['table_ID'];
    $connection->query("INSERT INTO `akcje_uzytkownikow` VALUES (NULL,'$user_id', 'Skasowanie fiszki', current_timestamp())");
    $connection->query("DELETE FROM `fiszki` WHERE `fiszki`.`ID` = ".$_GET['row_ID']);
    header('Location: ../index.php?open='.$post_ID);
}else{
    $post_ID = $_GET['table_ID'];
    $connection->query("INSERT INTO `akcje_uzytkownikow` VALUES (NULL,'$user_id', 'Skasowanie zbioru fiszek', current_timestamp())");
    $connection->query("DELETE FROM `fiszki` WHERE `fiszki`.`id_zbioru` = ".$_GET['table_ID']);
    $connection->query("DELETE FROM `zbiory_fiszek` WHERE `zbiory_fiszek`.`ID` = ".$_GET['table_ID']);
    header('Location: ../index.php?open='.$post_ID);
}


?>