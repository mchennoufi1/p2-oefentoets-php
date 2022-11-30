<!DOCTYPE HTML>
<html>
<head>
<?php
include('includes/header.php');
?>
</head>
<body>
<form method="post" action="">
    <label>leerling</label>
    <input type="text" name="leerling"><br>
    <label>vak</label>
    <input type="text" name="vak"><br>
    <label>cijfer</label>
    <input type="text" name="cijfer"><br>
    <br>
    <input type="submit" name="toevoegen" value="Toevoegen">
</form>
<?php
try {
    $db = new PDO("mysql:host=localhost;dbname=cijfersysteem"
        , "root");
    if (isset($_POST['toevoegen'])) {
        $leerling = $_POST['leerling'];
        $vak = $_POST['vak'];
        $cijfer = $_POST['cijfer'];
        $query = $db->prepare("INSERT INTO resultaten (leerling, vak, cijfer)
                 VALUES('$leerling', '$vak', '$cijfer')");
        if ($query->execute()) {
            echo "<br>";
            echo "De nieuwe gegevens zijn toegevoegd.";
            echo "<br>";
        } else {
            echo "Er is een fout opgetreden.";
        }
    }
}
             catch(PDOException $e) {
                die("Error!: " . $e->getmessage());
            }
?>

</body>
</html>
