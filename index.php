<?php
    $host = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $dbname = "dane";

    $conn = mysqli_connect($host, $dbuser, $dbpass, $dbname) or die("Błąd połączenia");

    $Widok = $_POST['Widok'];
    echo $Widok;
    $Ilosc = $_POST['Ilosc'];
    echo $Ilosc;

    if ($Ilosc>=0) {
        if ($Ilosc == 0 || $Ilosc <= 40) {
            $q = "SELECT imie,nazwisko,rok_urodzenia,opis,zdjecie FROM osoby";
            $result = mysqli_query($conn,$q);
        }
        elseif ($Ilosc>0 && $Ilosc<40) {
           $q = "SELECT imie,nazwisko,rok_urodzenia,opis,zdjecie FROM osoby LIMIT '$Ilosc'";
           $resutlt = mysqli_query($conn,$q);
        }
    };
    echo "<pre>";
        var_dump($result);
    echo "</pre>";
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
                <span>Ile wyświetlić rekordów (0 = WSZYSTKIE)</span>
                <input type="number" name="Ilosc" id="" default="0">
                <button type="submit">POKAŻ REKORDY</button>
            </form>
        </div>
        <div class="wynik"></div>
    </main>
</body>
</html>