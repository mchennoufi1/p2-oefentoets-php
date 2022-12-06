<!DOCTYPE HTML>
<html>
<head>

    <?php
    include('includes/header.php');
    ?>
</head>
<body>
<br>
<?php
try {
    $db = new PDO("mysql:host=localhost;dbname=cijfersysteem"
        , "root");
        $query = $db->prepare("SELECT * FROM resultaten");
        if ($query->execute()) 
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        foreach ($result as $data) {
            echo "<br>";
            echo "<a href='detail.php?id=" . $data['id'] . "'>";
            echo $data["leerling"] . " " . $data["vak"] . " " . $data["cijfer"];
            echo "</a>";
            echo "<br>";
        }
} catch(PDOException $e) {
    die("Error!: " . $e->getmessage());
}
?>

</body>
</html>
