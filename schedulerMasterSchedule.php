<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Master Schedule Creation</title>
</head>
<body>
<?php

$servername = "143.198.123.91:3306";
$database = "AgileExpG4";
$username = "user4";
$password = "userpwd4";
try {$conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    echo ("Connected successfully\n");} 
    catch (PDOException $e) 
    {die("error, please try again");}
    
    try {
        // Connect to SQL and send error message if needed
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        //Check if there is data for hours and days
        $lDays="";
        if (isset($_POST['labHours']) && isset($_POST['labDays'])){
          $lHour = $_POST["labHours"];
          foreach($_POST['labDays'] as $lDays1){
            $lDays .= $lDays1.", ";
            }
        
        $q = $conn->query("SELECT labID FROM LabHours ORDER BY labID DESC LIMIT 1");
        $labID = $q->fetchColumn();
        
        $sql = "INSERT INTO LabHours (labID, labDay, labTime) VALUES (:labID, :labDay, :labTime)";
        
        $stmt = $conn->prepare($sql);
        
        $stmt->execute([
        ':labID' => $labID+1,
        ':labDay' => $lDays,
        ':labTime' => $lHour,
        ]);
        
        echo("\n Lab ID: ");
        echo($labID+1);
        echo("Lab Days: ");
        echo($lDays);
        echo("Lab Time: ");
        echo($lHour);
        
        }
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
?>
</body>
</html>