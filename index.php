<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>EASC</title>
</head>
<body>
    <form name="form" method="POST">
        <h1>DEPARTMENT STUDENT ATTENDANCE</h1>
        <h2>Login Panel</h2>
        <label>Staff Name</label>
        <input type="text" name="user" id="user" required>
        <label>Staff ID</label>
        <input type="text" name="reg" id="reg" required>
        <label>Password</label>
        <input type="password" name="pass" id="pass" required>
        <input type="submit" class="btn btn-success" value="Login">

<?php
session_start();

$host = "localhost";
$dbuser = "root"; 
$dbpass = "";
$dbname = "studentattendance";

$conn = new mysqli($host, $dbuser, $dbpass, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $userInput = $_POST['user'];
    $regInput = $_POST['reg'];
    $passInput = $_POST['pass'];

    $sql = "SELECT * FROM `index` WHERE user = '{$userInput}' AND reg = '{$regInput}' AND pass = '{$passInput}'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        header("Location: Dashboard.php");
        exit();
    } 
    else {
        echo '<div class="alert">Invalid Username/Password!</div>';
    }

    $conn->close();
}
?>
    </form>
</body>
</html>
