<?php

echo "
                <div>
                    <h1>Liczba rekordów zwróconych z bazy: ". $Ilosc . "</h1>
                </div>
                <section class='cards'>";

                while ($row=mysqli_fetch_assoc($result)) { 
                    echo "
                    <div class='card'>
                        <div>
                            <img src=". $row['zdjecie'] .">
                        </div>
                        <div>
                            <span>". $row['imie'] ." ". $row['nazwisko'] ."</span>
                        </div>
                        <div>
                            <span>". $row['opis'] ."</span>
                        </div>
                    </div>
                    ";
                }
                echo "</section>";