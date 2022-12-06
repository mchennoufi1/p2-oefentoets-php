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
    if(isset($_POST['verzenden'])){
        $leerling = $_POST['leerling'];
        $vak = $_POST['vak'];
        $cijfer = $_POST['cijfer'];
        $query = $db->prepare("UPDATE resultaten SET vak = :vak, 
        cijfer = :cijfer WHERE id = :id");
        $query->bindParam("vak", $vak);
        $query->bindParam("cijfer", $cijfer);
        $query->bindParam("id", $_GET['id']);
        if ($query->execute()) {
            echo "<br>";
            echo "De nieuwe gegevens zijn toegevoegd.";
            echo "<br>";
        } else {
            echo "Er is een fout opgetreden.";
        } echo "<br>";

    } else{
        $query = $db->prepare("SELECT * FROM resultaten WHERE id = :id");
        $query->bindParam("id", $_GET['id']);
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        foreach ($result as &$data) {
            $leerling =  $data["leerling"];
            $vak =  $data["vak"];
            $cijfer =  $data["cijfer"];
        }
    }
} catch(PDOException $e) {
    die("Error!: " . $e->getmessage());
}
?>
<form method="post" action="">
    <label>leerling</label>
    <input type="text" name="leerling" value="<?php echo $leerling; ?>"><br>
    <label>vak</label>
    <input type="text" name="vak" value="<?php echo $vak; ?>"><br>
    <label>cijfer</label>
    <input type="text" name="cijfer" value="<?php echo $cijfer; ?>"><br>
    <br>
    <input type="submit" name="verzenden" value="Verzenden">
</form>
</body>
</html>
