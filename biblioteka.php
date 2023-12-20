<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteka</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div id="baner">
        <h1>Biblioteka w Książkowicach Małych</h1>
    </div>
    <div id="lewy">
        <h4>Dodaj czytelnika</h4>
        <form method="post" action="biblioteka.php">
            imię: <input type="text" name="imie"><br/>
            nazwisko: <input type="text" name="nazwisko"><br/>
            symbol: <input type="number" name="symbol"><br/>
            <button type="submit">AKCEPTUJ</button>
        </form>
        <?php
            $conn = new mysqli('localhost', 'root', '', 'biblioteka');
            if(!empty($_POST['imie']) && !empty($_POST['nazwisko']) && !empty($_POST['symbol'])) {
                $imie = $_POST['imie'];
                $nazwisko = $_POST['nazwisko'];
                $symbol = $_POST['symbol'];
                $conn -> query("INSERT INTO czytelnicy VALUES (NULL, '$imie', '$nazwisko', '$symbol');");
                echo "Dodano czytelnika ", $imie, " ", $nazwisko;
            }
        ?>
    </div>
    <div id="srodkowy">
        <img src="biblioteka.png" alt="biblioteka">
        <h6>
            ul. <br/>
            Czytelników&nbsp;15; <br/>
            Książkowice Małe
        </h6>
        <p>
            <a href="mailto:biuro@bib.pl">Czy masz jakieś uwagi?</a>
        </p>
    </div>
    <div id="prawy">
        <h4>Nasi czytelnicy:</h4>
        <ol>
            <?php
                $wynik = $conn -> query("SELECT imie, nazwisko FROM czytelnicy ORDER BY nazwisko ASC;");
                while($r = $wynik -> fetch_array()) {
                    echo "<li>", $r['imie'], " ", $r['nazwisko'], "</li>";
                }
                $conn -> close();
            ?>
        </ol>
    </div>
    <div id="stopka">
        <p>Projekt witryny: 04221304031</p>
    </div>
</body>
</html>