<!DOCTYPE html>
<html>
    <head>
        <!-- <link rel="stylesheet" type="text/css" href="homePage.css"> -->
            <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="mx-5">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
              <a class="navbar-brand" href="homePage.html">Home</a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
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
            
            
        <h1>Master Schedule Creation</h1>      
        <table>
            <tr>
                <th>All Courses</th>
            </tr>
            <tr>
                <th>Filled (Y/N)</th>
                <th>Course ID</th>
                <th>Course Days</th>
                <th>Course Times</th>
                <th>Taught By</th>
                <th>Assign SI</th>
            </tr>
            <?php
            $servername = "143.198.123.91:3306";
            $database = "AgileExpG4";
            $username = "user4";
            $password = "userpwd4";
            try {$conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
                echo ("Connected successfully\n");} 
                catch (PDOException $e) 
                {die("error, please try again");}
            $conn = mysqli_connect($servername, $username, $password, $database);
            $q = mysqli_query($conn, "SELECT * FROM Courses");
            //$courses = $q->fetchColumn();
            while($row = mysqli_fetch_array($q)) {
                echo "<tr>";
                if($row[5] != null){
                    echo "<td>"."Y"."</td>";
                } else {
                    echo "<td>"."N"."</td>";
                }
                echo "<td>".$row[0]."</td>";
                echo "<td>".$row[1]."</td>";
                echo "<td>".$row[2]."</td>";
                $profID = $row[4];
                $newQuery = mysqli_query($conn, "SELECT professorName FROM Professors WHERE professorID = $profID");
                $professorInfo = mysqli_fetch_array($newQuery);
                echo "<td>".$professorInfo[0]."</td>";
                ?>
                <td>
                <select>
                    <option selected = "selected">Choose a SI</option>
                    <?php 
                    $newQueryTwo = mysqli_query($conn, "SELECT * FROM Students WHERE isAssigned = 1");
                    while($newRow = mysqli_fetch_array($newQueryTwo)){
                        echo "<option value='strtolower($newRow[1])'>$newRow[1]</option>";
                    }
                    ?>
                </select>
                </td>
                </tr>";
                <?php
            }
            ?>
            
            
            <!--
            <tr>
                <td>N</td>
                <td>CS 141</td>
                <td>MonWedFri</td>
                <td>9:05-10:00</td>
                <td>Dr. Tetzlaff</td>
                <td><select name="students" id="students">
                    <option value="brandon">Brandon</option>
                    <option value="pierce">Pierce</option>
                    <option value="joel">Joel</option>
                    <option value="nick">Nick</option>
                  </select></td>
            </tr>
            <tr>
                <td>N</td>
                <td>CS 142</td>
                <td>TueThu</td>
                <td>10:10-11:05</td>
                <td>Dr. Thomas</td>
                <td><select name="students" id="students">
                    <option value="brandon">Brandon</option>
                    <option value="pierce">Pierce</option>
                    <option value="joel">Joel</option>
                    <option value="nick">Nick</option>
                  </select></td>
            </tr>
            <tr>
                <td>Y</td>
                <td>CS 144</td>
                <td>MonWedFri</td>
                <td>11:15-12:10</td>
                <td>Dr. Richardt</td>
                <td><select name="students" id="students" disabled>
                    <option value="brandon">Brandon</option>
                    <option value="pierce">Pierce</option>
                    <option value="joel">Joel</option>
                    <option value="nick">Nick</option>
                  </select></td>
            </tr> -->
            
        </table>
        <h2>Select Student</h2>
        <select name="availableStudents" id="availStudents">
            <option value="brandon">Brandon</option>
            <option value="pierce">Pierce</option>
            <option value="joel">Joel</option>
            <option value="nick">Nick</option>
        </select><br>

        <table>
            <tr>
                <th>Student Conflicts</th>
            </tr>
            <tr>
                <th>Conflict Days</th>
                <th>Conflict Time</th>
                <th>Conflict Type</th>
            </tr>
            <tr>
                <td>TueThu</td>
                <td>2:30p-3:55p</td>
                <td>Class</td>
            </tr>
            <tr>
                <td>TueThu</td>
                <td>10:10a-12:10p</td>
                <td>Class</td>
            </tr>
            <tr>
                <td>MonWed</td>
                <td>2:30p-5:35p</td>
                <td>Class</td>
            </tr>
            <tr>
                <td>MonWedFri</td>
                <td>12:20p-2:20p</td>
                <td>Class</td>
            </tr>
            <tr>
                <td>SatSun</td>
                <td>4:00p-12:00a</td>
                <td>Personal</td>
            </tr>
            <tr>
                <td>Thu</td>
                <td>6:30p-8:30p</td>
                <td>Personal</td>
            </tr>
        </table>
        <button type ="submit" onclick="window.location.href='schedulerHome.html';" class = "button">
            Submit
            </button>
        <button onclick="window.location.href='schedulerHome.html';" class = "button">
            Back to Scheduler Home
            </button>
<!-- Bootstrap Script -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
crossorigin="anonymous"></script>
<!-- Bootstrap Javascript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>