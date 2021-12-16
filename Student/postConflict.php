<!doctype html>
<html lang="en">

<style>
    .form-control {
        max-width: 330px;
        padding: 15px;
        margin: auto;
    }

    form {
        text-align: center;
    }
</style>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

    <title>SI Scheduler | Submit Course</title>
</head>

<body>
    <?php
    //checks if all the items are filled out on the previous form or will redirect the user back to the previous page
    $servername = "143.198.123.91";
    $database = "AgileExpG4";
    $username = "user4";
    $password = "userpwd4";

    $conn = mysqli_connect($servername, $username, $password, $database);
    if (!$conn) {
        die("Connection Failed! " . mysqli_connect_error());
    }
    echo $_POST["conflictTitle"], " ";
    echo $_POST["conflictType"], " ";
    echo $_POST["mondayClass"], "  ";
    echo $_POST["tuesdayClass"], "  ";
    echo $_POST["wednesdayClass"], "  ";
    echo $_POST["thursdayClass"], "  ";
    echo $_POST["fridayClass"], "  ";
    echo $_POST["startTime"], "  ";
    echo $_POST["endTime"], "  ";


    if (
        $_POST["courseId"] && $_POST["professorId"] && $_POST["startTime"] && $_POST["duration"] &&
        $_POST["semesters"] && $_POST["years"] && !is_null($_POST["studentId"]) && $_POST["days"]
    ) {
        //variables from the previous page
        $gConflictTitle = $_POST["conflictTitle"];
        $gConflictType = $_POST["conflictType"];
        $gMondayClass = $_POST["mondayClass"];
        $gTuesdayClass = $_POST["tuesdayClass"];
        $gWednesdayClass = $_POST["wednesdayClass"];
        $gThursdayClass = $_POST["thursdayClass"];
        $gFridayClass = $_POST["fridayClass"];
        $gStartTime = $_POST["startTime"];
        $gEndTime = $_POST["endTime"];


        //add the item to the database
        $sql = "INSERT INTO Conflicts (conflictDays, conflictStartTime, conflictEndTime, conflictType, conflictName, studentID)
                VALUES ('Mon Tue Wed Thurs Fri', '10:10 AM', '11:05 AM', 'Personal', 'Math Class', '0705516');";

        if ($conn->query($sql) === TRUE) {
            echo "New course added successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "BIG ERROR!!!";
    }
    $conn->close();
    ?>


    <div class="mx-5">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="homePage.html">Home</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="studentHome.html">Student</a>
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
        <h1>Course Submission</h1>
    </div>

    <!-- Bootstrap Script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
<!-- Bootstrap Javascript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>