<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>I-QUIZ - ustawienia użytkownika</title>
</head>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>I-QUIZ</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" media="screen" href="https://fontlibrary.org//face/barlow" type="text/css" />
</head>
<style>
    @media only screen and (min-width: 1024px){
    .zmiana-nazwy
    {position:absolute; top:200px;left:57%;font-size:42px;font-family:BarlowLight;width: 530px;background-color:#052C65;color:white;}
    #okienko-nazwy{
        position: absolute; top: 350px;left:60%;width:400px;height:250px;background-color:#163C76;
    }
    .a{
        background-color:#163D76;width:300px;height:25px;background-color:#052C65;font-family:BarlowLight;position:relative;top:25px
    }
    .b{
        background-color:#163D76;width:300px;height:25px;background-color:#052C65;font-family:BarlowLight;position:relative;top:50px;
    }
    .c{
        background-color:#163D76;width:300px;height:25px;background-color:#052C65;font-family:BarlowLight;position:relative;top:75px
    }
    .d{
        background-color:#163D76;width:300px;height:25px;background-color:#052C65;font-family:BarlowLight;position:relative;top:100px
    }
    #okienko-hasla{
        position: absolute; top: 450px;left:60%;width:400px;height:250px;background-color:#163C76;
    }
    .a1{
        background-color:#163D76;width:300px;height:25px;background-color:#052C65;font-family:BarlowLight;position:relative;top:25px
    }
    .b1{
        background-color:#163D76;width:300px;height:25px;background-color:#052C65;font-family:BarlowLight;position:relative;top:50px
    }
    .c1{
        background-color:#163D76;width:300px;height:25px;background-color:#052C65;font-family:BarlowLight;position:relative;top:75px
    }
    .d1{
        background-color:#163D76;width:300px;height:25px;background-color:#052C65;font-family:BarlowLight;position:relative;top:100px
    }
    #zmiana-hasla{
        position:absolute; top:300px;left:57%;font-size:42px;font-family:BarlowLight;width: 530px;background-color:#052C65;color:white;
    }
    .setting-title{
        position: absolute; top:50px; left:61%;font-size: 30px;
    }
    #setting-alert{
        position: absolute; top:100px;left:59%;font-size:25px;
    }
}
@media only screen and (max-width: 1023px){
    .zmiana-nazwy{
       position:absolute;left:30%;top:150px;font-size:30px;font-family:BarlowLight;width: 46%;background-color:#052C65;color:white;
    }
    #okienko-nazwy{
        position: absolute; top: 250px;left:35%;width:35%;height:250px;background-color:#163C76;
    }
    .a{
        background-color:#163D76;width:85%;height:25px;background-color:#052C65;font-family:BarlowLight;position:relative;top:25px
    }
    .b{
        background-color:#163D76;width:85%;height:25px;background-color:#052C65;font-family:BarlowLight;position:relative;top:50px;
    }
    .c{
        background-color:#163D76;width:85%;height:25px;background-color:#052C65;font-family:BarlowLight;position:relative;top:75px
    }
    .d{
        background-color:#163D76;width:85%;height:25px;background-color:#052C65;font-family:BarlowLight;position:relative;top:100px
    }
    #okienko-hasla{
        position: absolute; top: 450px;left:35%;width:35%;height:250px;background-color:#163C76;
    }
    .a1{
        background-color:#163D76;width:85%;height:25px;background-color:#052C65;font-family:BarlowLight;position:relative;top:25px
    }
    .b1{
        background-color:#163D76;width:85%;height:25px;background-color:#052C65;font-family:BarlowLight;position:relative;top:50px
    }
    .c1{
        background-color:#163D76;width:85%;height:25px;background-color:#052C65;font-family:BarlowLight;position:relative;top:75px
    }
    .d1{
        background-color:#163D76;width:85%;height:25px;background-color:#052C65;font-family:BarlowLight;position:relative;top:100px
    }
    #zmiana-hasla{
        position:absolute; top:300px;left:30%;font-size:30px;font-family:BarlowLight;width: 46%;background-color:#052C65;color:white;
    }
    .setting-title{
        position: absolute; top:-10px; left:32%;font-size: 26px;
        z-index: -2;
    }
    #setting-alert{
        position: absolute; top:40px;left:30%;font-size:18px;
        z-index: -3;
    }
}
</style>

<body>

    <div id="tytuł">
        <img class="photo_bigger" src="Photo/Title_Page_bigger_display.png" alt="Zdjęcie strona tytułowa">
        <img class="photo_small" src="Photo/Title_Page_small_display.png" alt="Zdjęcie strona tytułowa">
    <p class="setting-title"><b>USTAWIENIA UŻYTKOWNIKA</b></p>
    <p id="setting-alert" style="color: red;"></p>
    <div class="menu-ustawien">
        <div class="zmiana-nazwy" onclick="show1()">
            <b><center>Chcę zmienić nazwę</center></b>
        </div>
        <form id="okienko-nazwy" action="index.php" method="POST"> 
            <center><input type="text" name="username" class="a" required placeholder="Nazwa użytkownika"></center>
            <center><input type="text" name="username-new" class="b" required placeholder="Nowa nazwa użytkownika"></center>
            <center><input type="password" name="password" class="c" required placeholder="Hasło"></center>
            <center><input type="password" name="re-password" class="d" required placeholder="Potwierdź hasło"></center>
            <center><button type="submit" name="submit" style="position: relative;top:150px;font-family:BarlowLight;font-size:25px;width:150px;color:white">Potwierdź</button></center>        
        </form>
        <div id="zmiana-hasla" onclick="show2()">
            <b><center>Chcę zmienić hasło</center></b>
        </div>
        <form id="okienko-hasla" action="index.php" method="POST"> 
            <center><input type="text" name="username" class = "a1" required placeholder="Nazwa użytkownika" ></center>
            <center><input type="password" name="password-old" class="b1" required placeholder="Stare hasło" ></center>
            <center><input type="password" name="password-new" class="c1" required placeholder="Nowe hasło"></center>
            <center><input type="password" name="re-password" class="d1" required placeholder="Potwierdź nowe hasło"></center>
            <center><button type="submit" name="submit1" style="position: relative;top:150px;font-family:BarlowLight;font-size:25px;width:150px;color:white">Potwierdź</button></center>        
        </form>
    </div>
</body>
<script>
    function show1(){
        document.getElementById("okienko-nazwy").style.display = "block";
        document.getElementById("okienko-hasla").style.display = "none";
        document.getElementById("zmiana-hasla").style.top = "700px";
    }
    function show2(){
        document.getElementById("okienko-nazwy").style.display = "none";
        document.getElementById("okienko-hasla").style.display = "block";
        document.getElementById("zmiana-hasla").style.top = "300px";
    }
</script>
</html>
<?php 
require('connect.php');

if(isset($_POST['submit'])){
    $username = @$_POST['username'];
    $username_new = @$_POST['username-new'];
    $re_pass = @$_POST['re-password'];
    $password = @$_POST['password'];
    $check1 = mysqli_query($connect, "SELECT uzyt_nazwa FROM uzytkownicy WHERE uzyt_nazwa='$username'");
    if(mysqli_num_rows($check1) == 0){
        echo '<script>document.getElementById("setting-alert").innerHTML = "Nie znaleziono podanej nazwy użytkownika."</script>';
    }else{
        if($re_pass == $password){
            $check3 = mysqli_query($connect, "SELECT uzyt_nazwa, uzyt_haslo FROM uzytkownicy WHERE uzyt_nazwa='$username' AND uzyt_haslo = '$password'");
            if(mysqli_num_rows($check3) != 0){
                $check4 = mysqli_query($connect, "SELECT uzyt_nazwa FROM uzytkownicy WHERE uzyt_nazwa='$username_new'");
                if(mysqli_num_rows($check4) == 0){
                    mysqli_query($connect, "UPDATE uzytkownicy SET uzyt_nazwa = $username_new WHERE uzyt_nazwa='$username'");
                    $check1 = mysqli_query($connect, "SELECT uzyt_id FROM uzytkownicy WHERE uzyt_nazwa='$username_new'");
                    while($row = mysqli_fetch_assoc($check1)){
                        $id = $row['uzyt_id'];
                    }
                    echo '<script>document.getElementById("setting-alert").innerHTML = "Pomyślnie zmieniono nazwę!"; document.getElementById("setting-alert").style.color = "green"</script>';
                    mysqli_query($connect, "INSERT INTO akcje_uzytkownikow VALUES ('',$id,'zmiana_nazwy',CURRENT_TIMESTAMP)");
                }else{
                    echo '<script>document.getElementById("setting-alert").innerHTML = "Nazwa jest już w bazie danych."</script>';
                }
            }else{
                echo '<script>document.getElementById("setting-alert").innerHTML = "Wprowadziłeś złe hasło."</script>';
            }    
        }else{
        echo '<script>document.getElementById("setting-alert").innerHTML = "Wprowadzone hasła się różnią"</script>';
    }}
}
if(isset($_POST['submit1'])){
    $username = @$_POST['username'];
    $old_pass = @$_POST['password-old'];
    $re_pass = @$_POST['re-password'];
    $password = @$_POST['password-new'];
    $check1 = mysqli_query($connect, "SELECT uzyt_nazwa FROM uzytkownicy WHERE uzyt_nazwa='$username'");
    if(mysqli_num_rows($check1) == 0){
       echo '<script>document.getElementById("setting-alert").innerHTML = "Nie znaleziono podanej nazwy użytkownika."</script>';
    }else{
        $check2 = mysqli_query($connect, "SELECT uzyt_haslo FROM uzytkownicy WHERE uzyt_nazwa='$username'");
        while($row = mysqli_fetch_assoc($check2)){
            $pass = $row['uzyt_haslo'];
        }
        if($old_pass == $pass){
            if($password == $re_pass){
                $check3 = mysqli_query($connect, "SELECT uzyt_id FROM uzytkownicy WHERE uzyt_nazwa='$username'");
                    while($row = mysqli_fetch_assoc($check3)){
                        $id = $row['uzyt_id'];
                    }
                mysqli_query($connect, "UPDATE uzytkownicy SET uzyt_haslo = '$password' WHERE uzyt_nazwa='$username'");
                mysqli_query($connect, "INSERT INTO akcje_uzytkownikow VALUES ('',$id,'zmiana_hasla',CURRENT_TIMESTAMP)");
                echo '<script>document.getElementById("setting-alert").innerHTML = "Pomyślnie zmieniono hasło!"; document.getElementById("setting-alert").style.color = "green"</script>';
            }else{
                echo '<script>document.getElementById("setting-alert").innerHTML = "Wprowadzone nowe hasła się różnią."</script>';
            }
        }else{
            echo '<script>document.getElementById("setting-alert").innerHTML = "Wprowadziłeś złe stare hasło."</script>';
        }
}
}

?>