<!DOCTYPE HTML>
<html>
<head>

    <?php
    include('includes/header.php');
    ?>
</head>
<body>

<?php
try{
    echo "<table border='1'>";
    $db = new PDO("mysql:host=localhost;dbname=cijfersysteem"
        ,"root");
    $query = $db->prepare("SELECT * FROM resultaten");
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    foreach($result as &$data){
        echo "<tr>";
        echo "<td>" . $data["id"] . "</td>";
        echo "<td>" . $data["leerling"] . "</td>";
        echo "<td>" . $data["vak"] . "</td>";
        echo "<td>" . $data["cijfer"] . "</td>";
        echo "</tr>";
    }
} catch(PDOException $e) {
    die("Error!: " . $e->getmessage());
}
?>

</body>
</html>
