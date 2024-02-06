<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Studentnewregister.css">
    <title>EASC</title>
</head>
<body>
    <form name="form" method="POST">
        <h1>STUDENT NEW REGISTRATION</h1>
        <table>
            <tr>
                <td>
                    <label>Student Name</label>
                </td>
                <td id="input">
                    <input type="text" name="sname" id="sname" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label>Register no</label>
                </td>
                <td id="input">
                    <input type="text" name="reg" id="reg" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label>Course</label>
                </td>
                <td id="input">
                    <input type="text" name="course" id="course" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label>Year</label>
                </td>
                <td id="input">        
                    <input type="number" name="year" id="year" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label>Email</label>
                </td>
                <td id="input"> 
                    <input type="email" name="email" id="email" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label>Mobile no</label>
                </td>
                <td id="input"> 
                    <input type="number" name="mobile" id="mobile" required>
                </td>
            </tr>
        </table>
        <input type="submit" value="Submit">
        <br>
        <br>
        <button><a href="Dashboard.php" class="buttonoff">Back</a></button> 
        <br>
        <br>
        
<?php
session_start();

$host = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "studentattendance";

$conn = new mysqli($host, $dbuser, $dbpass, $dbname);

if (mysqli_connect_error()) {
    die('Connect Error (' . mysqli_connect_errno() . ') ' . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $sname = $_POST['sname'];
    $reg = $_POST['reg'];
    $course = $_POST['course'];
    $year = $_POST['year'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];

    $query = "INSERT INTO `studenntregister` (sname, reg, course, year, email, mobile) VALUES ('$sname', '$reg', '$course', '$year', '$email', '$mobile')";

    if (mysqli_query($conn, $query)) {
        echo '<div class="alert">Successfully Updated</div>';
        exit();
    } 

    $conn->close();
}
?>

    </form>
</body>
</html>
