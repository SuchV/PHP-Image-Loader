<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Archiwum Zdjęć</title>
</head>
<body>
    <div id="gora">
        <h1>Archiwum zdjęć online</h1>
        <form method="POST" action="strona.php" enctype="multipart/form-data">
                <label for="zdjecie">Plik:</label>
                <input type="file" name="photo" id="zdjecie">
                <button type="submit" name="submit">Wyślij</button>
        </form>
    </div>
    <div id="dol">
    <?php if(isset($_POST['submit']))
        {
            $path = 'images/'; 
            $location = $path . $_FILES['photo']['name']; 
            move_uploaded_file($_FILES['photo']['tmp_name'], $location);
            // wersja testowa kodu 
            $pliki = glob("images/*.*");
            for ($i = 0; $i < count($pliki); $i++) {
                $zdj = $pliki[$i];
                echo basename($zdj)."<br>";
                echo "<img src=".$zdj."><br>";
        }
    } 
    ?>
    </div>
</body>
</html>