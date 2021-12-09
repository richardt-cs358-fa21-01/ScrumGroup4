<!-- php
$servername = "localhost";
$username = "user4    ";
$password = "userpwd4";
$dbname = "AgileExpG4";

try {

    $newDiverName = $_POST['diverName'];


    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("INSERT INTO Diver (FullName) VALUES ( :diverName );");
    $stmt->bindParam(':diverName', $newDiverName, PDO::PARAM_STR, strlen($newDiverName));

    $stmt->execute();

#  }
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
header('Location: diver.html');


?> -->
<?php
$servername = "localhost";
$username = "user4    ";
$password = "userpwd4";
$dbname = "AgileExpG4";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if($conn->connect_error){
  die("Connection failed: " . $conn->connect_error);
}

echo "Connected successfully";
mysqli_close($conn);

?>