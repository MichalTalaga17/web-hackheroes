<?php
require_once "./actions/connect.php";
?>
<!DOCTYPE html>
<html lang="PL-pl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./css/css.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script>
    <?php
        $wynik = $connection->query("SELECT * FROM `zbiory_fiszek` WHERE uzyt_id = '".$user_id."'");
            if($wynik->num_rows > 0) {
                while($r = mysqli_fetch_assoc($wynik)) {
                    $i = 1;
                    $fisz_amount = $connection->query("SELECT * FROM `fiszki` WHERE id_zbioru=".$r['ID'])->num_rows;
                    $fisz_amount_ik = $connection->query("SELECT * FROM `fiszki` WHERE id_zbioru=".$r['ID']." AND `umiem`=1")->num_rows;
                    $fiszki = $connection->query("SELECT ID, front, back FROM `fiszki` WHERE id_zbioru = '".$r['ID']."' AND `umiem`=0");
                    echo 'var zestaw'.$r['ID'].'=[';
                                    if($fiszki->num_rows > 0){
                                        while($s=mysqli_fetch_assoc($fiszki)){
                                                    echo '"'.$s['front'].'","'.$s['back'].'",';
                                            }
                                    }
                    echo '];';
                }
            }
        ?>
    </script>
    <title>Kursy - Fiszki</title>
    <style>
        .bg-primary,
        .btn-primary,
        .bg-dark {
            background-color: #052C65 !important;
            border-color: #052C65 !important;
        }
    </style>
</head>

<body onload="
<?php
    if(isset($_SESSION['login_error'])){
        echo " logged_out(1); ";
    }
    if(isset($_SESSION['alert'])){
        echo "logged() ";
        unset($_SESSION['alert']);
    }else if(isset($_SESSION['logged_session'])){
        echo "logged_session() ";
    }else if(isset($_SESSION['reg_error'])){
        echo "logged_out(2); ";
    }else if(isset($_SESSION['reg_alert'])){
        echo "logged_out(3); ";
        unset($_SESSION['reg_alert']);
    }else{
        echo "logged_out(0); ";
    }
?>">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container px-lg-5">
            <a class="navbar-brand" href="../index.html">I-QUIZ</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" aria-current="page" href="../panel">Kursy</a></li>
                    <li class="nav-item"><a class="nav-link active" href="/fiszki">Fiszki</a></li>
                    <li class="nav-item"><a class="nav-link" href="../settings.php">Ustawienia</a></li>
                    <?php if(!isset($_SESSION['log_session'])) echo '<li class="nav-item"><a type="button" class="btn btn-warning" href="../login/">Zaloguj się</a></li>'?>
                    <?php if(isset($_SESSION['log_session'])) echo '<li class="nav-item"><a type="button" class="btn btn-warning" href="./actions/logout.php">Wyloguj sie</a></li>'?>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="container border-bottom fisz_box_top_header">
            <span class="text-secondary fs-3">Twoje zbiory fiszek</span>
            <a type="button" class="btn btn-warning add_fisz_box <?php if(!isset($_SESSION['log_session'])) echo 'visually-hidden'?>" data-bs-toggle="modal"
                data-bs-target="#new_fiszbox">Dodaj zestaw fiszek</a>
        </div>
        <?php
if(isset($_SESSION['log_session'])){
    $wynik = $connection->query("SELECT * FROM `zbiory_fiszek` WHERE uzyt_id = '".$user_id."'");
if($wynik->num_rows > 0) {
    while($r = mysqli_fetch_assoc($wynik)) {
        $i = 1;
        $fisz_amount = $connection->query("SELECT * FROM `fiszki` WHERE id_zbioru=".$r['ID'])->num_rows;
        $fisz_amount_ik = $connection->query("SELECT * FROM `fiszki` WHERE id_zbioru=".$r['ID']." AND `umiem`=1")->num_rows;
        $fisz_amount_repeat = $connection->query("SELECT * FROM `fiszki` WHERE id_zbioru=".$r['ID']." AND `utrwal`>0")->num_rows;
        $fiszki = $connection->query("SELECT ID, front, back FROM `fiszki` WHERE id_zbioru = '".$r['ID']."'");

        if($fisz_amount_ik!=0) $ik_percentage = $fisz_amount_ik/$fisz_amount*100;
        else $ik_percentage=0;

        echo'
            <div class="grid_box border-bottom">
                <div><img class="ikona_fiszek" src="./icons/'.$r['ikona'].'.jpg"></div>
                <div class="i1 fiszhead">
                    <div><p class="main-text">'.$r['nazwa'].'</p></div>
                    <div><p class="secondary-text">'.$r['temat'].'</p></div>
                </div>
                <div></div>
                <div class="i1">
                    <div>
                        <div class="lightsaber" style="background: rgb(255,0,0);
                        background: linear-gradient(90deg, #008f70 0%, #008f70 '.$ik_percentage.'%, lightgray '.$ik_percentage.'%, lightgray 100%);">
                        </div>
                    </div>
                    <div>
                        <p class="secondary-text umiem">Umiesz '.$fisz_amount_ik.'\\'.$fisz_amount.'</p>
                    </div>
                </div>
                <div class="i2">
                    <div></div>
                    <div>
                        <button type="button" class="btn btn-warning" onclick="show_edit_table('.$r['ID'].');">Edytuj</button> 
                    </div>
                </div>
                <div class="i2">
                    <div></div>
                    <div><button type="button" class="btn btn-danger">Utrwal: '.$fisz_amount_repeat.'</button></div>
                </div>
                <div class="i3">
                    <div>
                        <button type="button" class="btn btn-primary" style="z-index:2;" onclick="start(zestaw'.$r['ID'].')" data-bs-toggle="modal"
                        data-bs-target="#uczsie" id="uczsie_button">Ucz się</button>
                        <button type="button" class="btn btn-danger">Utrwal: '.$fisz_amount_repeat.'</button>
                        <button type="button" class="btn btn-warning" onclick="show_edit_table('.$r['ID'].');">Edytuj</button> 
                    </div>
                    <div></div>
                </div>
            </div>

            <div class="container edit_table_box" id="fiszbox-'.$r['ID'].'"';
            if(isset($_GET['open']) && $_GET['open']==$r['ID']) echo 'style="height: fit-content; overflow: show;"';
            echo '>
                <form action="./actions/save-table.php" method="post">
                    <table class="table table-hover edit_table">
                    <input class="visually-hidden" name="table_ID" value="'.$r['ID'].'">
                    <input class="visually-hidden" id="new_amount'.$r['ID'].'" name="new_amount'.$r['ID'].'" value="0">
                        <span class="close_edit_table" onclick="hide_edit_table('.$r['ID'].');">×</span>
                        <thead>
                            <tr>
                                <th scope="col" class="first_row_edit_table">
                                    <input class="form-control edit_table_input edit_table_th_input" name="name" value="'.$r['nazwa'].'" autocomplete="off">
                                </th>
                                <th scope="col" class="second_row_edit_table">Przód</th>
                                <th scope="col" class="third_row_edit_table">Tył</th>
                                <th scope="col" class="fourth_row_edit_table"></th>
                            </tr>
                        </thead>
                        <tbody id="fiszbody-'.$r['ID'].'">';
                        if($fiszki->num_rows > 0){
                            while($s=mysqli_fetch_assoc($fiszki)){
                                echo    '<tr';
                                if($i == $fiszki->num_rows) echo ' id="last_fisz'.$r['ID'].'"';
                                echo '>
                                            <th scope="row">'.$i.'</th>
                                            <td><input class="form-control edit_table_input" name="front-'.$s['ID'].'" value="'.$s['front'].'" autocomplete="off"></td>
                                            <td><input class="form-control edit_table_input" name="back-'.$s['ID'].'" value="'.$s['back'].'" autocomplete="off"></td>
                                            <td><a href="./actions/delete.php?table_ID='.$r['ID'].'&row_ID='.$s['ID'].'"><img class="edit_table_delete_icon" src="./icons/recycle-bin.svg"></a></td>
                                        </tr>';
                                        $i++;
                                }
                        }else{
                            echo    '<tr>
                                        <th colspan="4" class="empty_fisz_box_text">Zestaw jest pusty</th>
                                    </tr>';
                        }
        echo            '</tbody>
                        <tfoot>
                            <tr>
                                <th scope="row"><input class="form-control edit_table_input" name="topic" value="'.$r['temat'].'" autocomplete="off"></th>
                                <td></td>
                                <td>
                                    <button type="submit" class="btn btn-primary" href="">Zapisz</button>
                                    <button type="button" class="btn btn-warning" onclick="create_new_fisz('.$r['ID'].')">Dodaj fiszki</button>
                                </td>
                                <td class="edit_table_delete_icon_box"><a href="./actions/delete.php?table_ID='.$r['ID'].'"><img class="edit_table_delete_icon" src="./icons/recycle-bin.svg"></a></td>
                            </tr>
                        </tfoot>
                    </table>
                </form>
            </div>
            ';
    }
}else{
    echo'
    <div class="container">
        <h3 class="login_to_view"><a data-bs-toggle="modal" data-bs-target="#new_fiszbox">Nie posiadasz żadnych zestawów fiszek<br>Kliknij aby dodać</a></h3>
    </div>';
}
}else{
    echo'
    <div class="container">
        <h3 class="login_to_view">Zaloguj się aby wyświetlić fiszki</h3>
    </div>';
}
?>
    </div>
    <div class="modal fade" id="new_fiszbox" tabindex="-1" aria-labelledby="new_fiszbox" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="./actions/add_fiszbox.php" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title" id="new_fiszbox">Dodaj zestaw</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput1" placeholder="Historia"
                                name="name">
                            <label for="floatingInput">Nazwa</label>
                        </div>
                        <div class="input-group mb-3" id="choice">
                            <select class="form-select" id="inputGroupSelect03"
                                aria-label="Example select with button addon" name="topic">
                                <option selected>Temat</option>
                                <option value="Historia">Historia</option>
                                <option value="Język">Język</option>
                            </select>
                            <button class="btn btn-outline-secondary" type="button" onclick="another_topic()">Inny
                                temat</button>
                        </div>
                        <div class="form-floating mb-3 visually-hidden" id="text_area">
                            <input type="text" class="form-control" id="floatingInput" placeholder="Historia"
                                name="topic1" value=" ">
                            <label for="floatingInput">Temat</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Anuluj</button>
                        <button type="submit" class="btn btn-primary">Dodaj</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="uczsie" tabindex="-1" aria-labelledby="uczsie" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="./actions/add_fiszbox.php" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title" id="uczsie">Nauka</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close"></button>
                    </div>
                    <div class="modal-body" style="text-allign: center !important;">
                        <p class="fs-5 visually-hidden" id="fiszka_inside">123</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" id="nastepne">Zacznij naukę</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="./js/js.js"></script>
</body>

</html>