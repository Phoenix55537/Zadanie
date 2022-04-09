<?php
    $host = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $dbname = "dane";

    $conn = mysqli_connect($host, $dbuser, $dbpass, $dbname) or die("Błąd połączenia");
    $Widok = "Tabela";
    $Ilosc = 0;

    if (isset($_POST['Widok']) && isset($_POST['Ilosc'])) {
        $Widok = $_POST['Widok'];
        // echo $Widok;
        $Ilosc = $_POST['Ilosc'];
        // echo $Ilosc;
    }
   
    settype($Ilosc, "int");
    // echo gettype($Ilosc);

    
        if ($Ilosc == 0 || $Ilosc == 40) {
            $q = "SELECT imie,nazwisko,rok_urodzenia,opis,zdjecie FROM osoby;";
            $result = mysqli_query($conn,$q);
            // echo "<pre>";
            //     var_dump($result);
            // echo "</pre>";
        };

        if ($Ilosc>0) {
            if ($Ilosc<40) {
            $q = "SELECT imie,nazwisko,rok_urodzenia,opis,zdjecie FROM osoby LIMIT $Ilosc;";
            $result = mysqli_query($conn,$q);
            // echo "<pre>";
            //     var_dump($result);
            // echo "</pre>";
            };
        };
    // echo "<pre>";
    //     var_dump($result);
    // echo "</pre>";
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
                echo "
                    <div>
                        <h1>Liczba rekordów zwróconych z bazy:". $Ilosc . "</h1>
                    </div>
                        <div>
                            <table class='table' border='1'>
                                <tr>
                                    <th class='table_th'>
                                        LP.
                                    </th>
                                    <th class='table_th'>
                                        IMIĘ I NAZWISKO
                                    </th>
                                    <th class='table_th'>
                                        ROK URODZENIA
                                    </th>
                                    <th class='table_th'>
                                        OPIS
                                    </th>
                                    <th class='table_th'>
                                        ZDJĘCIE
                                    </th>
                                </tr>
                        </div>";
                   
                    while ($row=mysqli_fetch_assoc($result)) { 
                        $LP = $LP + 1;
                        echo "
                        <tr>
                            <td class='table_td'>". $LP ."</td>
                            <td class='table_td'>". $row['imie'] ."</td>
                            <td class='table_td'>". $row['nazwisko'] ."</td>
                            <td class='table_td'>". $row['rok_urodzenia'] ."</td>
                            <td class='table_td'>
                                <div class='t_img'><img src=". $row['zdjecie'] ."></div>
                            </td>
                        </tr>";
                        
                        // echo "<pre>";
                        // var_dump($row);
                        // echo "</pre>";
                    }
                echo "</table></div>";
            }

            if ($Widok == "Lista") {
                while ($row=mysqli_fetch_assoc($result)) { 
                    $LP = $LP + 1;
                    echo "
                    <div class='list'>
                    <span class='span'>". $LP .". ". $row['imie'] ." ". $row['nazwisko'] ."</span>
                        <li>Rok Urodzenia: ". $row['rok_urodzenia'] ."</li>
                        <li>Opis: ". $row['opis'] ."</li>
                    </div>";
                }
            }

            if ($Widok == "Karta")
            ?>
        </div>
    </main>
</body>
</html>