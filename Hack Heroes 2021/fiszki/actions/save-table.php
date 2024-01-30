<?php
require_once './connect.php';
$post_ID = $_POST['table_ID'];
$new_amount = $_POST['new_amount'.$post_ID];
$fiszki = $connection->query("SELECT ID, front, back FROM `fiszki` WHERE id_zbioru = '".$post_ID."'");
if($fiszki->num_rows > 0){
    if($new_amount==0) $connection->query("INSERT INTO `akcje_uzytkownikow` VALUES (NULL,'$user_id', 'Zapisanie zmian w zbiorze fiszek', current_timestamp())");
    $connection->query("UPDATE `zbiory_fiszek` SET `nazwa` = '".$_POST['name']."' WHERE `zbiory_fiszek`.`ID` = ".$post_ID);
    $connection->query("INSERT `zbiory_fiszek` SET `temat` = '".$_POST['topic']."' WHERE `zbiory_fiszek`.`ID` = ".$post_ID);
    while($s=mysqli_fetch_assoc($fiszki)){
        $connection->query("UPDATE `fiszki` SET `front` = '".$_POST['front-'.$s['ID']]."' WHERE `fiszki`.`ID` = ".$s['ID']);
        $connection->query("UPDATE `fiszki` SET `back` = '".$_POST['back-'.$s['ID']]."' WHERE `fiszki`.`ID` = ".$s['ID']);
    }
}
if($new_amount>0){
    $connection->query("INSERT INTO `akcje_uzytkownikow` VALUES (NULL,'$user_id', 'Zapisanie zmian w zbiorze i dodanie nowych fiszek', current_timestamp())");
    for($i=$fiszki->num_rows+1;$i<=$new_amount+$fiszki->num_rows; $i++){
        $nowy_front = $_POST['nowyfront'.strval($i)];
        $nowy_back = $_POST['nowyback'.strval($i)];
        $connection->query("INSERT INTO `fiszki` (`id_zbioru`, `front`, `back`, `umiem`, `utrwal`) VALUES ('".$post_ID."', '".$nowy_front."', '".$nowy_back."', '0','0')");
    }
}
header('Location: ../index.php?open='.$post_ID);
?>