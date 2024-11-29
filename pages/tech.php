<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/form.css">
    <title>Search Student</title>
</head>

<body>

    <div class="container" id="container">
     
        <div class="form-container sign-in">
            <form action="../includes/techLogin.php" method="POST">
            
                <h1>Sign In</h1>
             
                <span>use your email and password</span>
                <input type="email"  class="form-control" id="email" name="email" placeholder="admin@gmail.com">
             
                <input type="text"  class="form-control" id="password" name="password" placeholder="admin">
              
            
                <button type="submit">Sign In</button>
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
              
                <div class="toggle-panel toggle-right">
                <h1>Hello, tech!</h1>
                    <p>Register with your personal details to use all of site features</p>
                    <button>  <a href="../index.php" style="color:aliceblue;">Back to Home</a> </button> 
                   
                </div>
            </div>
        </div>
    </div>

    <script src="../assets/js/script.js"></script>
</body>

</html>