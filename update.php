<!DOCTYPE HTML>
<html>
<head>

    <?php
    include('includes/header.php');
    ?>
</head>
<body>

<?php
try {
    $db = new PDO("mysql:host=localhost;dbname=cijfersysteem"
        , "root");
    if (isset($_POST['update'])) {
        $leerling = filter_input(INPUT_POST, "leerling", FILTER_SANITIZE_STRING);
        $vak = filter_input(INPUT_POST, "vak", FILTER_SANITIZE_STRING);
        $cijfer = filter_input(INPUT_POST, "cijfer", FILTER_SANITIZE_FLOAT);

        $query = $db->prepare("UPDATE resultaten SET vak = :vak, cijfer = :cijfer WHERE id = :id");
        $query->bindParam("leerling", $leerling);
        $query->bindParam("vak", $vak);
        $query->bindParam("cijfer", $cijfer);
        if ($query->execute()) {
            echo "<br>";
            echo "De nieuwe gegevens zijn toegevoegd.";
            echo "<br>";
        } else {
            echo "Er is een fout opgetreden.";
        }
    }else {
        $query = $db->prepare("SELECT * FROM resultaten WHERE id = :id");
        $query->bindParam("id", $_GET['id']);
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        foreach ($result as &$data) {
            echo "<tr>";
            echo "<td>" . $data["id"] . "</td>";
            echo "<td>" . $data["leerling"] . "</td>";
            echo "<td>" . $data["vak"] . "</td>";
            echo "<td>" . $data["cijfer"] . "</td>";
            echo "</tr>";
        }
    }
}
catch(PDOException $e) {
    die("Error!: " . $e->getmessage());
}
?>
<form method="post" action="">
    <label>leerling</label>
    <input type="text" name="leerling" value="<?php echo $leerling; ?>"><br>
    <label>vak</label>
    <input type="text" name="vak" value="<?php echo $vak; ?>"><br>
    <label>cijfer</label>
    <input type="text" name="cijfer value="<?php echo $cijfer; ?>""><br>
    <br>
    <input type="submit" name="update" value="Update">
</form>
</body>
</html>
