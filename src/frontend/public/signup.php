<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="assets/css/style.css">        	
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body>

<nav class="navbar">
            <input type="checkbox" id="nav-check">
            <label for="nav-check" class="check-button">
                <i class="fa fa-bars"></i>
            </label>
            <label class="logo"><span class="say">Say</span><span class="it">It</span></label>
            <ul>
                <li <?php if($page == "Home") echo "class='active'"; ?>><a href="../../../../index.php">Home</a></li>
                <li <?php if($page == "Artikel") echo "class='active'"; ?>><a href="artikel.php">Artikel</a></li>
                <li <?php if($page == "Ruang Diskusi") echo "class='active'"; ?>><a href="ruangdiskusi.php">Ruang Diskusi</a></li>
                <li <?php if($page == "Lapor") echo "class='active'"; ?>><a href="lapor.php">Lapor</a></li>
                <li <?php if($page == "SignUp") echo "class='active'"; ?>><a href="signup.php">Sign Up</a></li>
            </ul>
        </nav>
        <section></section>
        <div class="signupbg">
    <div>
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
</div>
</div>
</body>
</html>