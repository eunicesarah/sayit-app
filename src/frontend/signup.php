<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
</head>
<body>
    <h1>Sign Up</h1>
    <form action="../backend/validate-signup.php" method="post">
        <div>
            <label for="name">Name</label><br>
            <input type="text" id="name" name="name">
        </div>
        <div>
            <label for="email">Email</label><br>
            <input type="text" id="email" name="email">
        </div>
        <div>
            <label for="gender">Gender</label><br>
            <input type="radio" id="female" name="gender" value="Female" >
            <label for="female">Female</label>
            <input type="radio" id="male" name="gender" value="Male" >
            <label for="male">Male</label><br>
        </div>
        <div>
            <label for="phone">Phone Number</label><br>
            <input type="tel" id="phone" name="phone">
        </div>
        <div>
            <label for="age">Age</label><br>
            <input type="int" id="age" name="age">
        </div>
        <div>
            <label for="password">Password</label><br>
            <input type="password" id="password" name="password">
        </div>
        
        <button type="submit" id="register">Register</button>
    </form>
</body>
</html>