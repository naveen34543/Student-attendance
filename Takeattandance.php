<?php
$selectedHours = isset($_POST['hour']) ? $_POST['hour'] : '';
$semester = isset($_POST['semester']) ? $_POST['semester'] : '';

$con = new PDO("mysql:host=localhost;dbname=studentattendance", 'root', '');

$counter = 0;

if (isset($_POST['submit']) && isset($_POST['attendance_status'])) {

    $course = isset($_POST['course']) ? $_POST['course'] : '';
    $date = date("Y-m-d");

    foreach ($_POST['attendance_status'] as $id => $attendance_status) {
        $sname = $_POST['sname'][$id];
        $reg = $_POST['reg'][$id];
        $course = $_POST['course'][$id];
        $year = $_POST['year'][$id];
        $selectedHours = $_POST['hour'][$id];
        $semester = $_POST['semester'][$id];

        $query = "INSERT INTO `day_to_day_attendance` (sname, reg, course, year, hour, semester, attendance_status, date) VALUES ('$sname', '$reg', '$course', '$year', '$selectedHours', '$semester', '$attendance_status', '$date')";

        if (!$con->query($query)) {
            echo "Error: " . implode(" ", $con->errorInfo());
        }

        $counter++;
    }

    if ($counter > 0) {
        echo '<script>
            function myFunction() {
                alert("Successfully Attendance Updated");
                window.location.href = "Dashboard.php";
            }
            myFunction();
        </script>';    
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Takeattandance.css">
    <title>EASC</title>
</head>

<body>
    <h1>TAKE ATTENDANCE</h1>
    <form method="post">
        <div id="searchbar">
            <button><a href="Dashboard.php" class="buttonoff">Back</a></button>
            <label>Date : <?php echo date("Y-m-d"); ?></label>
            <label>Course :</label>
            <input type="text" name="course" id="course" required>
            <label>Year :</label>
            <input type="number" name="year" id="year" required>
            <label>Semester :</label>
            <select name="semester" <?php echo $semester; ?> required>
                <option value="">Select</option>
                <option value="I">I</option>
                <option value="II">II</option>
                <option value="III">III</option>
                <option value="IV">IV</option>
                <option value="V">V</option>
                <option value="VI">VI</option>
            </select>
            <label>Hour :</label>
            <select name="hour" <?php echo $selectedHours; ?> required>
                <option value="">Select</option>
                <option value="I">I</option>
                <option value="II">II</option>
                <option value="III">III</option>
                <option value="IV">IV</option>
                <option value="V">V</option>
            </select>
            <input type="submit" name="submit" id="submit_button" value="Search">
        </div>
    </form>
    <br>
    <form id="formtwo" method="POST">
        <table>
            <tr>
                <th>S.no</th>
                <th>Name</th>
                <th>Reg no</th>
                <th>Course</th>
                <th>Year</th>
                <th>Semester</th>
                <th>Hour</th>
                <th>Attendance Status</th>
            </tr>
            <?php
            $serialnumber = 0;
            if (isset($_POST["submit"])) {
                $course = $_POST["course"];
                $year = $_POST["year"];

                $sth = $con->prepare("SELECT * FROM `studenntregister` WHERE course = :course AND year = :year ORDER BY reg");

                $sth->bindParam(':course', $course);
                $sth->bindParam(':year', $year);

                $sth->setFetchMode(PDO::FETCH_OBJ);
                $sth->execute();

                while ($row = $sth->fetch()) {
                    $serialnumber++;
                    ?>
                    <tr>
                        <td><?php echo $serialnumber; ?></td>
                        <td><?php echo $row->sname; ?>
                            <input type="hidden" value="<?php echo $row->sname; ?>" name="sname[<?php echo $serialnumber; ?>]" id="sname_<?php echo $serialnumber; ?>">
                        </td>
                        <td><?php echo $row->reg; ?>
                            <input type="hidden" value="<?php echo $row->reg; ?>" name="reg[<?php echo $serialnumber; ?>]" id="reg_<?php echo $serialnumber; ?>">
                        </td>
                        <td><?php echo $row->course; ?>
                            <input type="hidden" value="<?php echo $row->course; ?>" name="course[<?php echo $serialnumber; ?>]" id="course_<?php echo $serialnumber; ?>">
                        </td>
                        <td><?php echo $row->year; ?>
                            <input type="hidden" value="<?php echo $row->year; ?>" name="year[<?php echo $serialnumber; ?>]" id="year_<?php echo $serialnumber; ?>">
                        </td>
                        <td>
                            <?php echo $semester ?>
                            <input type="hidden" value="<?php echo $semester; ?>" name="semester[<?php echo $serialnumber; ?>]" id="semester_<?php echo $serialnumber; ?>">
                        </td>
                        <td>
                            <?php echo $selectedHours ?>
                            <input type="hidden" value="<?php echo $selectedHours; ?>" name="hour[<?php echo $serialnumber; ?>]" id="hour_<?php echo $serialnumber; ?>">
                        </td>
                        <td>
                            <input type="radio" name="attendance_status[<?php echo $serialnumber; ?>]" id="attendance_status_present_<?php echo $serialnumber; ?>" value="present" required>Present
                            <input type="radio" name="attendance_status[<?php echo $serialnumber; ?>]" id="attendance_status_absent_<?php echo $serialnumber; ?>" value="absent" required>Absent
                        </td>
                    </tr>
                    <?php
                }
            }
            if ($serialnumber == 0) {
                echo "<tr id='nocolour'><td>No records found.</td></tr>";
            }
            
            ?>
        </table>
        <input type="submit" name="submit" id="submit_button" value="Submit">
    </form>
</body>

</html>
