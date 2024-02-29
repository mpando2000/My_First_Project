<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NORMAL FORM</title>
</head>
<body>
    <h1>Register now</h1>
    <form action="">
        <label for="fname">First name</label>
        <input type="text" name="fname" id="fname"required>
        <br><br>
        <label for="lname">Last name</label>
        <input type="text" name="lname" id="lname"required>
        <br><br>
        <label for="age">Age</label>
        <input type="number" name="age" id="age"required>
        <br><br>
        <label for="gender">Gender</label>
        <input type="radio" name="gender" id="gender"required>Male
        <input type="radio" name="gender" id="gender"required>Female
        <br><br>
        <label for="date">Date</label>
        <input type="date" name="date" id="date"required>
        <br><br>
        <label for="password">Password</label>
        <input type="password" name="password" id="password"required>
        <br><br>
        <input type="submit" value="Register"name="submit">
    </form>
</body>
</html>