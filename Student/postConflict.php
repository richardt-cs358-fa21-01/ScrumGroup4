<?php
$servername = "http://143.198.123.91:3306";
$username = "admin4";
$password = "pocket4lion";
$dbname = "AgileExpG4";

try {
    echo "<p> big nice </p>";
    $newDiverName = $_POST['diverName'];

    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("INSERT INTO Diver (FullName) VALUES ( :diverName );");
    $stmt->bindParam(':diverName', $newDiverName, PDO::PARAM_STR, strlen($newDiverName));

    $stmt->execute();

    echo $conn;
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
header('Location: diver.html');


?>
