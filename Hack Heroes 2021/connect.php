<?php 
$connect = mysqli_connect("localhost", "HH", "HackHeroes") or die ("Nie połączono z bazą danych");
$database = mysqli_select_db($connect, "hackheroesdb") or die("Nie połączono z bazą danych")
?>