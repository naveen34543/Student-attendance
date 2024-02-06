<?php
session_start();

$user = $_POST['user'];
$reg = $_POST['reg'];
$pass = $_POST['pass'];
$mobile = $_POST['mobile'];
$email = $_POST['email'];

if (!empty($user) && !empty($reg) && !empty($pass) && !empty($mobile) && !empty($email)) {
    $host = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $dbname = "studentattendance";

    $conn = new mysqli($host, $dbuser, $dbpass, $dbname);

    if (mysqli_connect_error()) {
        die('Connect Error (' . mysqli_connect_errno() . ') ' . mysqli_connect_error());
    } else {
        $query = "INSERT INTO `index` (user, reg, pass, mobile, email) VALUES ('$user', '$reg', '$pass', '$mobile', '$email')";

        if (mysqli_query($conn, $query)) {
            echo '<script>
            function myFunction() {
                alert("Successfully Updated");
                window.location.href = "index.php";
            }
            myFunction();
        </script>';    
        exit();
        }
        $conn->close();
    }
}
?>
