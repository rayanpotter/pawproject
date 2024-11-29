<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/form.css">
    <title>Student Login</title>
</head>

<body>

    <div class="container" id="container">
        <div class="form-container sign-up">
            <form action="../db/addStudent.php" method="post">
                <h1>Create Account</h1>
             
                <span> use your email for registeration</span>
                <input type="text" placeholder="Nom" name="nom" required>
                <input type="text" placeholder="Prenom" name="prenom" required>
                <input type="email" placeholder="Email" name="email" required>
                <input type="text" placeholder="Groupe" name="groupe" required>
                <button name="submit_student" value="Add Student">Sign Up</button>
            </form>
        </div>
        <div class="form-container sign-in">
            <form action="../db/loginStudent.php" method="post">
                <h1>Sign In</h1>
              
                <span> use your email and your name</span>
                <input type="email" placeholder="Email" name="email">
                <input type="text" placeholder="nom" name="nom">
              
                <button type="submit" value="Login">Sign In</button>
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>Welcome Back!</h1>
                    <p>Enter your personal details to use all of site features</p>
                    <button class="hidden" id="login">Sign In</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>Hello, Student!</h1>
                    <p>Register with your personal details to use all of site features</p>
                    <button class="hidden" id="register">Sign Up</button>
                    <button>  <a href="../index.php" style="color:aliceblue;">Back to Home</a> </button> 
                </div>
            </div>
        </div>
    </div>

    <script src="../assets/js/script.js"></script>
</body>

</html>