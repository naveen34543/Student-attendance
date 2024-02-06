<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="daytodayattandance.css">
    <title>EASC</title>
    <style>
        .absent-row {
            background-color: #ee425f; 
        }
    </style>
</head>
<body>
    <h1>DAY TO DAY ATTENDANCE</h1>
    <form method="post" id="searchbar">
        <div>
            <button><a href=" Dashboard.php" class="buttonoff">Back</a></button>
            <label>Course :</label>
            <input type="text" name="course" id="course">
            <label>Year :</label>
            <input type="number" name="year" id="year">
            <input type="date" name="date" id="date">
            <input type="submit" name="submit" id="submit button" value="Search">
            <input type="text" placeholder="Enter a student Reg.no" name="reg" id="reg">
            <input type="submit" name="search" id="search" value="search">
        </div>
    </form>
    <br>
    <form id="formtwo" method="post">
        <table>
            <tr>
                <th>S.no</th>
                <th>Date</th>
                <th>Name</th>
                <th>Reg no</th>
                <th>Course</th>
                <th>Hour</th>
                <th>Attendance Status</th>
            </tr>
            <?php
            $con = new PDO("mysql:host=localhost;dbname=studentattendance", 'root', '');

            if (isset($_POST["submit"])) {
                $course = $_POST["course"];
                $year = $_POST["year"];
                $date = $_POST["date"];

                $sth = $con->prepare("SELECT * FROM `day_to_day_attendance` WHERE course = :course and year = :year and date = :date ORDER BY reg");

                $sth->bindParam(':course', $course);
                $sth->bindParam(':year', $year);
                $sth->bindParam(':date', $date);

                $sth->setFetchMode(PDO::FETCH_OBJ);
                $sth->setFetchMode(PDO::FETCH_OBJ);
                $sth->setFetchMode(PDO::FETCH_OBJ);

                $sth->execute();

                $serialnumber = 0;
                while ($row = $sth->fetch()) {
                    $serialnumber++;
            
                    $rowClass = ($row->attendance_status == 'absent') ? 'absent-row' : '';
                    ?>
                    <tr class="<?php echo $rowClass; ?>">
                        <td><?php echo $serialnumber; ?></td>
                        <td><?php echo $row->date; ?></td>
                        <td><?php echo $row->sname; ?></td>
                        <td><?php echo $row->reg; ?></td>
                        <td><?php echo $row->course; ?></td>
                        <td><?php echo $row->hour; ?></td>
                        <td><?php echo $row->attendance_status; ?></td>
                    </tr>
                <?php
                }

                if ($serialnumber == 0) {
                    ?>
                    <tr id="nocolour">
                        <td>No records found.</td>
                    </tr>
                <?php
                }
            }

            if (isset($_POST["search"])) {
                $reg = isset($_POST["reg"]) ? $_POST["reg"] : '';

                $sth = $con->prepare("SELECT * FROM `day_to_day_attendance` WHERE reg = :reg ORDER BY date DESC");

                $sth->bindParam(':reg', $reg);

                $sth->setFetchMode(PDO::FETCH_OBJ);
                $sth->execute();

                $serialnumber = 0;
                while ($row = $sth->fetch()) {
                    $serialnumber++;
                    
                    $rowClass = ($row->attendance_status == 'absent') ? 'absent-row' : '';
                    ?>
                    <tr class="<?php echo $rowClass; ?>">
                        <td><?php echo $serialnumber; ?></td>
                        <td><?php echo $row->date; ?></td>
                        <td><?php echo $row->sname; ?></td>
                        <td><?php echo $row->reg; ?></td>
                        <td><?php echo $row->course; ?></td>
                        <td><?php echo $row->hour; ?></td>
                        <td><?php echo $row->attendance_status; ?></td>
                    </tr>
                <?php
                }

                if ($serialnumber == 0) {
                    ?>
                    <tr id="nocolour">
                        <td>No records found.</td>
                    </tr>
                <?php
                }
            }
            ?>
        </table>
    </form>
</body>
</html>
