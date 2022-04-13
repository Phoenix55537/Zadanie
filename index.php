<?php
include_once "connect.php";
$Widok = "Tabela";
$Ilosc = 0;

include_once "widok_ilość.php";
   
settype($Ilosc, "int");

    
include_once "widok_ilość.php";

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <main>
        <div class="form">
            <form action="" method="post">
                <span>W jaki sposób ma zostać wyświetlony wynik</span>
                <select name="Widok" id="">
                    <option value="Tabela">Tabela</option>
                    <option value="Lista">Lista</option>
                    <option value="Karta">Karta</option>
                </select>
                <br>
                <span>Ile wyświetlić rekordów (0 = WSZYSTKIE)</span>
                <input type="number" name="Ilosc" id="" min="0" max="40">
                <br>
                <button type="submit">POKAŻ REKORDY</button>
            </form>
        </div>
        <div class="wynik">
            <?php
            $LP = 0;
            if ($Widok == "Tabela") {
                include "tabela.php";
            }

            if ($Widok == "Lista") {
                include "list.php";
            }

            if ($Widok == "Karta"){
                include "card.php";
            }
            ?>
        </div>
    </main>
</body>
</html>