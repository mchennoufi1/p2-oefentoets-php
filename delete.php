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
    if (isset($_GET['id'])) {
        $query = $db->prepare("DELETE FROM resultaten WHERE id = :id");
        $query->bindParam("id", $_GET['id']);
        if ($query->execute()) {
            echo "<br>";
            echo "Het item is verwijderd.";
            echo "<br>";
        } else {
            echo "Er is een fout opgetreden.";
        }
    }
} catch(PDOException $e) {
    die("Error!: " . $e->getmessage());
}
    $query = $db->prepare("SELECT * FROM resultaten");
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    foreach ($result as &$data) {
        echo "<a href='delete.php?id=" . $data['id'] . "'>";
        echo $data['leerling'] . " " . $data['vak'] . " " . $data['cijfer'];
        echo "</a>";
        echo "<br>";
}
?>
</body>
</html>
