<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <title>SI Scheduler | Template Page</title>
</head>

<body>
  <div class="mx-5">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="index.html">Home</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" href="student/studentHome.html">Student</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="professorHome.html">Professor</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="schedulerHome.html">Scheduler</a>
          </li>
        </ul>
      </div>
    </nav>
    <?php

$servername = "143.198.123.91:3306";
$username = "admin4";
$password = "pocket4lion";
$dbname = "AgileExpG4";

$conflictDays = "";
if (array_key_exists('mondayClass', $_POST)) {
  $conflictDays = $conflictDays . "Mon ";
}
if (array_key_exists('tuesdayClass', $_POST)) {
  $conflictDays = $conflictDays . "Tue ";
}
if (array_key_exists('wednesdayClass', $_POST)) {
  $conflictDays = $conflictDays . "Wed ";
}
if (array_key_exists('thursdayClass', $_POST)) {
  $conflictDays = $conflictDays . "Thurs ";
}
if (array_key_exists('fridayClass', $_POST)) {
  $conflictDays = $conflictDays . "Fri ";
}

$query = "INSERT INTO Conflicts (conflictDays, conflictStartTime, conflictEndTime, conflictType, conflictName, studentID)
          VALUES ('".$conflictDays."', '".$_POST['startTime']."', '".$_POST['endTime']."', '".$_POST['conflictType']."', '".$_POST['conflictTitle']."', 'unknown');";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare($query);
    $stmt->execute();

    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

    echo "
    <script>
    alert('Successfully added Conflict!');
      location.href = '/Student/studentHome.html';
    </script>
    ";
}
catch(PDOException $e) {
  echo "<h2>An Error has occurred</h2>";
  echo "Error: " . $e->getMessage();
  echo "<br /><a class='btn' href='/Student/studentHome.html'>Back to Student Page</a>";
}
$conn = null;
?>
  </div>

  <!-- Bootstrap Script -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script>
</body>

</html>