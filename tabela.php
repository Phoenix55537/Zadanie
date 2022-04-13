<?php

echo "
<div>
    <h1>Liczba rekordów zwróconych z bazy: ". $Ilosc . "</h1>
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
        <td class='table_td'>". $row['imie'] ." ". $row['nazwisko'] ."</td>
        <td class='table_td'>". $row['rok_urodzenia'] ."</td>
        <td class='table_td'>". $row['opis'] ."</td>
        <td class='table_td'>
            <div class='t_img'><img src=". $row['zdjecie'] ."></div>
        </td>
    </tr>";
    
    // echo "<pre>";
    // var_dump($row);
    // echo "</pre>";
}
echo "</table>";