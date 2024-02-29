<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table form</title>
</head>
<body>
    <form action="index.php" method="post">
        <table style="border :1px solid red; padding:20px; text-align: right">
            <tr>
                 <td><label for="fname">First name</label></td>
                <td><input type="text" name="fname" id="fname"reguired></td>
            </tr>
            <tr>
                <td><label for="lname">Last name</label></td>
                <td><input type="text" name="lname" id="lname"required></td>
            </tr>
            <tr>
                <td><label for="age">Age</label></td>
                <td><input type="number" name="age" id="age"reguired></td>
            </tr>
            <tr>
                <td><label for="gender">Gender</label></td>
                <td><input type="radio" name="gender" id="gender" value="Male"required>Male
                <input type="radio" name="gender" id="gender"required>Female</td>
            </tr>
            <tr>
                <td><label for="date">Date</label></td>
                <td><input type="date" name="date" id="date"required></td>
            </tr>
            <tr>
                <td><label for="password">Password</label></td>
                <td><input type="password" name="password" id="password"required></td>
            </tr>
            <tr></tr>
            <tr></tr>
            <tr></tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Register" name="submit"></td>
            </tr>
        </table>
    </form>
</body>
</html>
