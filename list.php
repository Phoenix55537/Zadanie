<?php

echo "
<div>
    <h1>Liczba rekordów zwróconych z bazy: ". $Ilosc . "</h1>
</div>";

while ($row=mysqli_fetch_assoc($result)) { 
    $LP = $LP + 1;
    echo "
    <div class='list'>
    <span class='span'>". $LP .". ". $row['imie'] ." ". $row['nazwisko'] ."</span>
        <li>Rok Urodzenia: ". $row['rok_urodzenia'] ."</li>
        <li>Opis: ". $row['opis'] ."</li>
    </div>";
}