<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Staffnewregister.css">
    <title>EASC</title>
</head>
<body>
    <form name="form" action="Staffnewregisterdb.php" method="POST">
    <table>
        <h1>STAFF NEW REGISTRATION</h1>
        <tr>
            <td>
        <label>Staff Name </label>
        </td>
        <td>
        <input type="text" name="user" id="user" required>
        </td>
        </tr>
        <tr>
            <td>
        <label>Staff ID </label>
        </td>
        <td>
        <input type="text" name="reg" id="reg" required>
        </td>
        </tr>
        <tr>
            <td>
        <label>Email </label>
        </td>
        <td>
        <input type="email" name="email" id="email" required>
        </td>
        </tr>
        <tr>
            <td>
        <label>Mobile no </label>
        </td>
        <td>
        <input type="number" name="mobile" id="mobile" required>
        </td>
        </tr>
        <tr>
            <td>
        <label>Create Password </label>
        </td>
        <td>
        <input type="password" required>
        </td>
        </tr>
        <tr>
            <td>
        <label>Confirm Password </label>
        </td>
        <td>
        <input type="password" name="pass" id="pass" required>
        </td>
        </tr>
        </table>
        <br>
        <input type="submit" class="btn btn-success" value="Submit">
        <br>
        <br>
        <button><a href=" Dashboard.php" class="buttonoff">Back</a></button>
        <br>
        <br>
    </form>
</body>
</html>