<?php

if (isset($_POST['Widok']) && isset($_POST['Ilosc'])) {
    $Widok = $_POST['Widok'];
    // echo $Widok;
    $Ilosc = $_POST['Ilosc'];
    // echo $Ilosc;
}

if ($Ilosc == 0 || $Ilosc == 40) {
    $q = "SELECT imie,nazwisko,rok_urodzenia,opis,zdjecie FROM osoby;";
    $result = mysqli_query($conn,$q);
    $Ilosc = 40;
};

if ($Ilosc>0) {
    if ($Ilosc<40) {
    $q = "SELECT imie,nazwisko,rok_urodzenia,opis,zdjecie FROM osoby LIMIT $Ilosc;";
    $result = mysqli_query($conn,$q);

    };
};