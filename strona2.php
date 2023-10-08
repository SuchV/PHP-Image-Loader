<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Photo Archive</title>
</head>
<body>
    <div id="gora">
        <h1>Photo Archive</h1>
        <form method="POST" action="strona2.php" enctype="multipart/form-data">
                <label for="inImage">Plik:</label>
                <input type="file" name="image" id="inImage">
                <button type="submit" name="submit">Send</button>
        </form>
    </div>
    <div id="dol">
    <?php if(isset($_POST['submit']))
        {
            $path = 'images/'; 
            $location = $path . $_FILES['image']['name']; 
            move_uploaded_file($_FILES['image']['tmp_name'], $location);
            $pliki = glob("images/*.*");
            for ($i = 0; $i < count($pliki); $i++) {
                $zdj = $pliki[$i];
                echo basename($zdj)."<br>";
                echo "<img src=".$zdj."><br><br>";
        }
    } 
    ?>
    </div>
</body>
</html>
